<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <!-- <link rel="stylesheet" href="./css/index.css"> -->
    <style>
        h1{
            /*  animation: name duration timing-function delay iteration-count direction fill-mode; */
            animation: change 0.5s 5s infinite;
        }
        h2{
            animation: change 1s 4s infinite;
        }
        h3{
            animation: change 2s 3s infinite;
        }
        h4{
            animation: change 3s 2s infinite;
        }
        h5{
            animation: change 4s 1s infinite;
        }
        h6{
            animation: change 5s infinite;
        }
        @keyframes change {
            from{
                opacity: 0;
            },
            to{
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    <h1>Bug</h1>
    <h2>Bug</h2>
    <h3>Bug</h3>
    <h4>Bug</h4>
    <h5>Bug</h5>
    <h6>Bug</h6>
    <i>The site root is not secure</i>
</body>
</html>