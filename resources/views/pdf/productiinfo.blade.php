<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technical Data Sheet</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 12px;
            line-height: 1.5;
            margin: 0;
            padding: 0;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header img {
            max-width: 150px;
            margin-bottom: 10px;
        }

        .header h1 {
            font-size: 16px;
            margin: 0;
            text-transform: uppercase;
        }

        .section {
            margin-bottom: 20px;
        }

        .section h2 {
            font-size: 14px;
            background-color: #f2f2f2;
            padding: 5px;
            border: 1px solid #ccc;
            margin: 0 0 10px;
        }

        .section table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        .section table td {
            padding: 5px;
            border: 1px solid #ccc;
            vertical-align: top;
            word-wrap: break-word;
        }

        .section table td:first-child {
            width: 30%;
            font-weight: bold;
        }

        .section table td:last-child {
            width: 70%;
        }

        .footer {
            font-size: 10px;
            text-align: center;
            margin-top: 20px;
            color: #666;
        }

        .footer p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="table">
            <table style="width: 100%;">
            <tr>
                <td><img src="https://teque7.in/logo/penta-logo.png" alt="Penta Chem" style="width: 800px; height: auto"></td>
                <td>
                    <p style="text-align: right; font-size: 12px; font-weight: bold;"> 
                    PENTA CHEM (M.E) FZE<br>
                    <span style="font-size: 10px; font-weight: normal;">PENTA CHEM (ME) FZE South Zone, 2 Jebel Ali,<br>
                    PO Box 18025 Dubai, UAE<br>
                    Tel. +912224198800 <br></span>
                    info@pentachem.com<br>
                    www.pentachem.com<br>
                </p>
                </td>
            </tr>
        </table>
        </div>
        
        <h2>{{$title}}</h2> Make {{$product->manufacturer}}
    </div>

    @php
    $technical = [];
    foreach ($technical_raw as $mainKey => $subArray) {
        $mainTitle = getPropertyTitles($mainKey) ?? '';
        $technical[$mainTitle] = [];

        foreach ($subArray as $key => $value) {
            $title = getPropertyTitle($key);
            $technical[$mainTitle][$title] = $value;
        }
    }
    // Step 1: Move "Specifications" category to the end
    if (isset($technical['Specifications'])) {
        $specifications = ['Specifications' => $technical['Specifications']];
        unset($technical['Specifications']);
        $technical = array_merge($technical, $specifications);
    }

    // Step 2: Move "Identification" category to the beginning
    if (isset($technical['Identification'])) {
        $identification = ['Identification' => $technical['Identification']];
        unset($technical['Identification']);
        $technical = array_merge($identification, $technical); // Merge at the beginning
    }

    // Step 3: Reorder fields inside "Identification" category
    if (isset($technical['Identification'])) {
        $identification = $technical['Identification'];

        // Prioritize "Chemical Name" and "Chemical Formula"
        $priorityFields = [];
        if (!empty($identification['Chemical Name'])) {
            $priorityFields['Chemical Name'] = $identification['Chemical Name'];
            unset($identification['Chemical Name']);
        }
        if (!empty($identification['Chemical Formula'])) {
            $priorityFields['Chemical Formula'] = $identification['Chemical Formula'];
            unset($identification['Chemical Formula']);
        }

        // Merge priority fields first, then the remaining fields
        $technical['Identification'] = array_merge($priorityFields, $identification);
    }

    // Remove empty categories
    foreach ($technical as $key => $fields) {
        $filteredFields = array_filter($fields, fn($value) => !empty($value));
        if (empty($filteredFields)) {
            unset($technical[$key]);
        } else {
            $technical[$key] = $filteredFields;
        }
    }
@endphp

@forelse ($technical as $categoryName => $fields)
<div class="section">
    <h2>{{ $categoryName }}</h2>
    <table>
        @foreach ($fields as $field => $value)
            <tr>
                <td>{{ $field }}</td>
                <td>{{ $value }}</td>
            </tr>
        @endforeach
    </table>
</div>
@empty
@endforelse
@if (!empty($product->storageandlife))
                <div class="section">
                    <h2 class="text-[#202020] font-bold text-[20px]">Storage & Shelf Life</h2>
                    <p>
                        {{ $product->storageandlife }}
                    </p>
                </div>
            @endif

    <div class="footer">
        <p>The data refers to a typical batch. It is only for informational purposes and not contractually bound.</p>
    </div>
</body>
</html>
