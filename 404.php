<style>
    * {
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }

    body {
        padding: 0;
        margin: 0;
    }

    #notfound {
        position: relative;
        height: 100vh;
    }

    #notfound .notfound {
        position: absolute;
        left: 50%;
        top: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }

    .notfound {
        max-width: 767px;
        width: 100%;
        line-height: 1.4;
        text-align: center;
        padding: 15px;
    }

    .notfound .notfound-404 {
        position: relative;
        height: 220px;
    }

    .notfound .notfound-404 h1 {
        font-family: 'Kanit', sans-serif;
        position: absolute;
        left: 50%;
        top: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        font-size: 186px;
        font-weight: 200;
        margin: 0px;
        background: linear-gradient(130deg, #2980be, #18c1e3);
        color: transparent;
        -webkit-background-clip: text;
        background-clip: text;
        text-transform: uppercase;
    }

    .notfound h2 {
        font-family: 'Kanit', sans-serif;
        font-size: 33px;
        font-weight: 200;
        text-transform: uppercase;
        margin-top: 0px;
        margin-bottom: 25px;
        letter-spacing: 3px;
    }


    .notfound p {
        font-family: 'Kanit', sans-serif;
        font-size: 16px;
        font-weight: 200;
        margin-top: 0px;
        margin-bottom: 25px;
    }


    .notfound a {
        font-family: 'Kanit', sans-serif;
        color: #2980be;
        font-weight: 200;
        text-decoration: none;
        border-bottom: 1px dashed #2980be;
        border-radius: 2px;
    }

    @media only screen and (max-width: 480px) {
        .notfound .notfound-404 {
            position: relative;
            height: 168px;
        }

        .notfound .notfound-404 h1 {
            font-size: 142px;
        }

        .notfound h2 {
            font-size: 22px;
        }
    }
</style>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>404</title>

    <link href="https://fonts.googleapis.com/css?family=Kanit:200" rel="stylesheet">

</head>

<body>
    <div id="notfound">
        <div class="notfound">
            <div class="notfound-404">
                <h1>404</h1>
            </div>
            <h2>Oops! Nothing was found</h2>
            <p>The page you are looking for might have been removed had its name changed or is temporarily unavailable. <a href="index">Return to homepage</a></p>

        </div>
    </div>

</body>

</html>