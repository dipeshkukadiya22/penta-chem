<?php

namespace App\Livewire;

use App\Models\pdfdownload;
use App\Models\Product;
use App\Models\User;
use App\Notifications\ProductInquire;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Options;
use Dompdf\Dompdf;
use Livewire\Component;
use Illuminate\Support\Facades\Notification;

class ProductInside extends Component
{
    public $productid;
    public $productname;
    // Form variables
    public $firstname, $lastname, $email, $phone, $companyname;

    public function mount($id)
    {
        $this->productid = $id;
        //dd($this->productid);
    }

    public function render()
    {
        $product = Product::where('slug', $this->productid)->first();
        if (!$product) {
            abort(404, 'Product not found');
        }

        $categories = json_decode($product->technical_specification, true);
        $this->productname = $product->product_name;

        return view('livewire.productinside', [
            'product' => $product,
            'technical_raw' => $categories
        ])->title($this->productname);
    }

    public function formSubmit()
    {



        //store in the DB

        $savemodel = new pdfdownload();
        $savemodel->firstname = $this->firstname;
        $savemodel->lastname = $this->lastname;
        $savemodel->email = $this->email;
        $savemodel->mobilenumber = $this->phone;
        $savemodel->companyname = $this->companyname;
        $savemodel->product = $this->productname;
        $savemodel->date = date('Y-m-d');
        $savemodel->save();
        $this->reset(['firstname', 'lastname', 'email', 'phone', 'companyname']);
        $this->dispatch('closePopup')->to($this);


        //genrate pdf

        $product = Product::where('slug', $this->productid)->first();
        if (!$product) {
            abort(404, 'Product not found');
        }

        $categories = json_decode($product->technical_specification, true);

        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $options->set('defaultFont', 'DejaVu Sans');
        $dompdf = new Dompdf($options);

        $html = view('pdf.productiinfo', [
            'product' => $product,
            'technical_raw' => $categories,
            'title' => $this->productname
        ])->render();

        $dompdf->loadHtml($html);
        $dompdf->render();

        return response()->streamDownload(
            fn() => print($dompdf->output()),
            "$this->productname.pdf"
        );
    }
}
