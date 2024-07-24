<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>专家解答，从未失手</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f5f5f5;
        }
        .container {
            text-align: center;
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h3 {
            color: red;
        }
        h1 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }
        h2 {
            margin-bottom: 10px;
            font-size: 18px;
            color: #666;
        }
        button {
            padding: 10px 20px;
            margin: 10px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #007bff;
            color: #fff;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #0056b3;
        }
        form {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }
        input[type="text"] {
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-right: 10px;
        }
        input[type="submit"] {
            padding: 8px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #007bff;
            color: #fff;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>专家解答，从未失手</h3>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST['input'])) {
                echo '<h2 style="color: red;">问题不能为空！</h2>';
            } else {
                $s = $_POST['input'];
                echo '<h1>问题：' . htmlspecialchars($s) . '</h1>';
                processInput($s);
            }
        } elseif (isset($_GET['s'])) {
            $s = $_GET['s'];
            echo '<h1>问题：' . htmlspecialchars($s) . '</h1>';
            processInput($s);
        } else {
            echo '<h1>请输入问题：</h1>';
            echo '<form method="post">';
            echo '<input type="text" name="input" placeholder="请输入您的问题">';
            echo '<input type="submit" value="提交">';
            echo '</form>';
        }

        function processInput($s) {
            echo '<h2>请选择你需要的专家：</h2>';
            echo '<button onclick="redirect(\'https://www.baidu.com/s?wd=' . urlencode($s) . '\')">百度</button>';
            echo '<button onclick="redirect(\'https://www.bing.com/search?q=' . urlencode($s) . '\')">必应</button>';
            echo '<button onclick="redirect(\'https://www.google.com.hk/search?q=' . urlencode($s) . '\')">谷歌</button>';
            echo '<div id="expertAnswer" style="display: none;">5秒后显示专家解答...</div>';
        }
        ?>
    </div>

    <script>
        function redirect(url) {
            setTimeout(function() {
                window.location.href = url;
                document.getElementById("expertAnswer").style.display = "block";
            }, 5000);
        }
    </script>
</body>
</html>
