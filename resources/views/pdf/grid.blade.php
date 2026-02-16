<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body {
            margin: 20px;
        }
        table {
            border-collapse: separate;
            border-spacing: {{ $cellSpacing }}px;
        }
        td {
            width: {{ $cellSize }}px;
            height: {{ $cellSize }}px;
            text-align: center;
            vertical-align: middle;
            font-size: {{ max(8, $cellSize - 14) }}px;
            font-family: monospace;
            font-weight: bold;
        }
        td.cell-zero {
            background-color: {{ $colorZero }};
        }
        td.cell-x {
            background-color: {{ $colorX }};
        }
        .separator {
            height: {{ $cellSize / 2 }}px;
        }
    </style>
</head>
<body>
    <table>
        @foreach ($verticalArray as $index => $row)
            <tr>
                @foreach (explode(' ', rtrim($row)) as $char)
                    @if ($char === '0')
                        <td class="cell-zero">0</td>
                    @elseif ($char === 'X')
                        <td class="cell-x">X</td>
                    @else
                        <td></td>
                    @endif
                @endforeach
            </tr>
        @endforeach
    </table>
</body>
</html>
