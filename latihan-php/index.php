<?php
    //ini comment, baris ini tidak akan dieksekusi
    $greeting = "Hello, World!";
    //cek user agent
    print_r($_SERVER['HTTP_USER_AGENT']);
    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    if (strpos($userAgent, 'Chrome') !== false) {
        $greeting = "Hello, Chrome User!";
    } elseif (strpos($userAgent, 'Firefox') !== false) {
        $greeting = "Hello, Firefox User!";
    } elseif (strpos($userAgent, 'Safari') !== false) {
        $greeting = "Hello, Safari User!";
        
    }
?>
<html>

    <!-- ini comment, baris ini tidak akan dieksekusi -->
    <head>
        <title>My Website <?php echo $greeting; ?></title>
        <style>
            /* ini comment, baris ini tidak akan dieksekusi */
            body {
                font-family: Arial, sans-serif;
                background-color: #f0f0f0;
                text-align: center;
                padding: 50px;
            }
            h1 {
                <?php
                    //kalau browsernya chrome, maka warna h1 akan merah
                    if (strpos($userAgent, 'Chrome') !== false) {
                        echo 'color: red;';
                    } elseif (strpos($userAgent, 'Firefox') !== false) {
                        echo 'color: orange;';
                    } elseif (strpos($userAgent, 'Safari') !== false) {
                        echo 'color: green;';
                    } else {
                        echo 'color: blue;';
                    }
                ?>
            }
            p {
                color: #666;
            }
        </style>
    </head>

    <body>
        <h1>Welcome to My Website</h1>
        <h2><?php echo $greeting; ?></h2>
        <p>This is a simple PHP page.</p>
        <script>
            //ini comment, baris ini tidak akan dieksekusi
            //ini javascript
            //var greeting = "<?php echo $greeting; ?>";
            let userAgent = navigator.userAgent;
            if (userAgent.includes('Chrome')) {
                greeting = "Hello, Chrome User!";
            } else if (userAgent.includes('Firefox')) {
                greeting = "Hello, Firefox User!";
            } else if (userAgent.includes('Safari')) {
                greeting = "Hello, Safari User!";
            }
           // alert(greeting);
        </script>
    </body>
</html>