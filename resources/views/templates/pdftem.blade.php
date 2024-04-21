<!DOCTYPE html>
<html lang="en">

<head>
</head>
<style>
    body {
        margin: 0;
        font-family: "Nunito", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        font-size: 1rem;
        font-weight: 400;
        color: #141414;
        background-color: #fff;
    }

    table {
        width: 80%;
        border-collapse: collapse;
        margin: 0 auto;
    }

    th,
    td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .text-center {
        text-align: center !important;
    }
</style>

<body>
    @yield('title')
    <div class="container">
        @yield('table')
    </div>
</body>

</html>