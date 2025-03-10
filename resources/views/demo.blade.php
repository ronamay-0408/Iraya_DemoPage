<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('Iraya-logo-favicon.png') }}" />
    <title>Live Demo</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            border: 0;
        }
        html, body {
            width: 100%;
            height: 100%;
            overflow: hidden;
        }
        iframe {
            width: 100%;
            height: 100%;
            display: block;
        }
    </style>
</head>
<body>
    <iframe id="demo-iframe"></iframe>

    <script>
        // Get URL parameter
        const params = new URLSearchParams(window.location.search);
        const demoUrl = params.get("url");

        // Set the iframe source if URL exists
        if (demoUrl) {
            document.getElementById("demo-iframe").src = decodeURIComponent(demoUrl);
        } else {
            document.body.innerHTML = "<h2>No demo URL provided!</h2>";
        }
    </script>

</body>
</html>
