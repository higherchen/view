<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <title>Smarty Demo</title>
    <style type="text/css">
        body, h1, h2, h3, td, th, p {
            font-family: sans-serif;
            font-weight: normal;
            font-size: 0.9em;
            margin: 1px;
            padding: 0;
        }
        h1 {
            margin: 0;
            text-align: left;
            padding: 2px;
            background-color: #f0c040;
            color: black;
            font-weight: bold;
            font-size: 1.2em;
        }
        h2 {
            background-color: #9B410E;
            color: white;
            text-align: left;
            font-weight: bold;
            padding: 2px;
            border-top: 1px solid black;
        }
        h3 {
            text-align: left;
            font-weight: bold;
            color: black;
            font-size: 0.7em;
            padding: 2px;
        }
        body {
            background: black;
        }
        p, table, div {
            background: #f0ead8;
        }
        p {
            margin: 0;
            font-style: italic;
            text-align: center;
        }
        table {
            width: 100%;
        }
        th, td {
            font-family: monospace;
            vertical-align: top;
            text-align: left;
        }
        td {
            color: green;
        }
        .odd {
            background-color: #eeeeee;
        }
        .even {
            background-color: #fafafa;
        }
        .exectime {
            font-size: 0.8em;
            font-style: italic;
        }
        #bold div {
            color: black;
            font-weight: bold;
        }
        #blue h3 {
            color: blue;
        }
        #normal div {
            color: black;
            font-weight: normal;
        }
        #table_assigned_vars th {
            color: blue;
            font-weight: bold;
        }
        #table_config_vars th {
            color: maroon;
        }
    </style>
</head>
<body>

<h1>{$hello}</h1>

<div>
    <span class="exectime">{$with_data}</span>
</div>

<div>
    <span class="exectime">{$tag}</span>
</div>

</body>
</html>