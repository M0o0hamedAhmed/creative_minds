<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');
        body{
            background: linear-gradient(135deg, rgba(30,29,31,1) 0%, #424874 100%);
            font-family: 'Poppins', sans-serif;
        }
        #box{
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            margin: auto;
            height: 250px;
            max-width: 400px;
            border: 1px solid #F4EEFF;
            padding: 2rem;
            box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
            background-color: #F4EEFF;
        }
        .card{
            position: relative;
            width: 100%;
            height: 100%;
            cursor: pointer;
            transform-style: preserve-3d;
            transform-origin: center right;
            transition: transform 1s;
        }
        .card .input-container{
            margin: 2rem  0;
            display: flex;
            position: relative;
        }
        .card.is-flipped {
            transform: translateX(-100%) rotateY(-180deg);
        }
        .card__face {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
        }
        .card__face--back {
            transform: rotateY(180deg);
        }

        .icon-wrapper{
            background: #424874;
            width: 30px;
            height: 34px;
            border-radius: 5px 0px 0px 5px;
        }
        .icon-wrapper i{
            font-size: 20px;
            padding: 7px;
            color: #F4EEFF;
        }
        #mobile_number , #UserPassword{
            background: transparent;
            border: 1px solid #424874;
            width: 100%;
            padding: 0 10px;
            font-size: 13px;
            border-radius: 0px 5px 5px 0px;
        }
        input[type="checkbox"] {
            appearance: none;
            width: 15px;
            height: 15px;
            border: 1px solid #808080;
        }
        input[type="checkbox"]:checked {
            position: relative;
            background: none;
        }
        input[id="checkbox"]:checked::after {
            position: absolute;
            top: 0.28rem;
            left: 0.11rem;
            content: "";
            width: 10px;
            height: 3px;
            border: 3px solid #424874;
            border-right: none;
            border-top: none;
            transform: rotate(309deg);
        }

        .input-container label{
            font-size: 11px;
            padding: 4px;
        }

        .b-sign{
            color : #DCD6F7;
            background: #424874;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            box-shadow: rgb(50 50 93 / 25%) 0px 50px 100px -20px, rgb(0 0 0 / 30%) 0px 30px 60px -30px, rgb(10 37 64 / 35%) 0px -2px 6px 0px inset;
            position: absolute;
            right: 0;
            bottom: -20px;
            cursor: pointer;
            width: 100%;
            font-size: 14px;
        }
        .i-more{
            position: absolute;
            right: 1%;
            top: 0%;
        }
        .i-more i{
            font-size:24px;
            color: #424874;
            cursor: pointer;
        }
        .b-support{
            background: #DCD6F7;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            cursor: pointer;
            display: block;
            text-align: center;
            margin: 2rem 0;
            font-size: 14px;
            box-shadow: rgb(50 50 93 / 25%) 0px 50px 100px -20px, rgb(0 0 0 / 30%) 0px 30px 60px -30px, rgb(10 37 64 / 35%) 0px -2px 6px 0px inset;
        }
        .b-cta{
            color : #DCD6F7;
            background: #424874;
            display: block;
            text-align: center;
            margin: 2rem 0;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
        }

        @media (max-width: 300px) {
            #box{
                padding: 1rem  0.2rem;
            }
        }
    </style>
    <title>Login</title>
</head>
<body>
<form method="POST"  action="{{route('login')}}">
    @csrf
    <div id="box">
        <div class="card">
            <div class="card__face card__face--front">
                <div class="i-more">
                    <i class="fa fa-ellipsis-h"></i>
                </div>
                <div class="input-container">
                    <div class="icon-wrapper"><i class="fa fa-user"></i></div>
                    <input name="mobile_number" required="required" placeholder="mobile_number" maxlength="255" type="text" id="mobile_number">
                </div>
                <div class="input-container">
                    <div class="icon-wrapper"><i class="fa fa-lock"></i></div>
                    <input name="password" required="required" placeholder="Password" type="password" id="UserPassword">
                </div>
                <div class="input-container">
                    <input type="checkbox" id="checkbox" name="checkbox" value="Remember Me?" >
                    <label for="checkbox">Remember Me?</label>
                </div>
                <div class="input-container">
                    <input class="b-sign" type="submit" value="Sign in">
                </div>
            </div>
            <div class="card__face card__face--back">
                <div class="i-more">
                    <i class="fa fa-ellipsis-h"></i>
                </div>
                <div>Need help?</div>
                <a onclick="" class='b-support' title='Forgot Password?'> Forgot Password?</a>
                <a onclick="" class='b-support' title='Contact Support'> Contact Support</a>
                <a onclick="" class='b-cta' title='Sign up now!'> CREATE ACCOUNT</a>
            </div>
        </div>
    </div>
</form>



</body>

</html>
