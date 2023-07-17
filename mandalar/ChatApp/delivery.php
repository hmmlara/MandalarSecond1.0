<?php include_once "header.php"; ?>
<body>
    <style>
        .deli-select{
            display:flex;
            justify-content: center;
            align-items: center;
            margin: 2px;
            padding: 10px;
        }
        .take, .send{
            display: flex;
            justify-content: center;
            align-items: center;
            width: 75px;
            height: 40px;
            border-radius: 5px;
            border: 1px solid #4e9c81;
            margin: 8px;
            font-weight: 500;
            font-size: 18px;
        }
        .deli-select-active{
            background: #4e9c81;
            border: none;
        }
        .wave{
            display: flex;
            margin: 5px;
        }
        .wave .content{
            width: calc(100% - 100px);
            border: 3px solid #4e9c81;
            height: 70px;
            display: flex;
            border-radius: 5px;
            align-items: center;
            padding: 5px;
        }
        .wave img{
            width: 50px;
            height: 50px;
            border-radius: 5px;
        }
        .wave .details{
            margin: 5px;
        }
        .wave .button{
            width: 80px;
            height: 68px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 5px;
            background: #4e9c81;
            margin-left: 10px;
            font-size: 20px;
            font-weight: 500;
            text-align: center;
        }
    </style>
    <div class="wrapper">
        <div class="users delivery">
            <header>
                <div class="content">
                    <img src="php/images/1689404007onepiece.jpg" alt="">
                    <div class="details">
                        <span>Thwin Htoo Naung</span>
                    </div>
                </div>
            </header>
            <div class="deli-select">
                <div class="take deli-select-active">Text</div>
                <div class="send">Send</div>
            </div>
            <div class="wave">
                <div class="content">
                    <img src="php/images/1689404007onepiece.jpg" alt="">
                    <dvi class="details">
                        <p><strong>Item  :</strong> iph 14 pro max</p>
                        <p><strong>Brand  :</strong> Apple</p>
                    </dvi>
                </div>
                <div class="button">
                        Go Take
                </div>
            </div>
            <div class="wave">
                <div class="content">
                    <img src="php/images/1689404007onepiece.jpg" alt="">
                    <dvi class="details">
                        <p><strong>Item  :</strong> iph 14 pro max</p>
                        <p><strong>Brand  :</strong> Apple</p>
                    </dvi>
                </div>
                <div class="button">
                        Go Take
                </div>
            </div>
            <div class="wave">
                <div class="content">
                    <img src="php/images/1689404007onepiece.jpg" alt="">
                    <dvi class="details">
                        <p><strong>Item  :</strong> iph 14 pro max</p>
                        <p><strong>Brand  :</strong> Apple</p>
                    </dvi>
                </div>
                <div class="button">
                        Go Take
                </div>
            </div>
            <div class="wave">
                <div class="content">
                    <img src="php/images/1689404007onepiece.jpg" alt="">
                    <dvi class="details">
                        <p><strong>Item  :</strong> iph 14 pro max</p>
                        <p><strong>Brand  :</strong> Apple</p>
                    </dvi>
                </div>
                <div class="button">
                        Go Take
                </div>
            </div>
            <div class="wave">
                <div class="content">
                    <img src="php/images/1689404007onepiece.jpg" alt="">
                    <dvi class="details">
                        <p><strong>Item  :</strong> iph 14 pro max</p>
                        <p><strong>Brand  :</strong> Apple</p>
                    </dvi>
                </div>
                <div class="button">
                        Go Take
                </div>
            </div>
            <div class="wave">
                <div class="content">
                    <img src="php/images/1689404007onepiece.jpg" alt="">
                    <dvi class="details">
                        <p><strong>Item  :</strong> iph 14 pro max</p>
                        <p><strong>Brand  :</strong> Apple</p>
                    </dvi>
                </div>
                <div class="button">
                        Go Take
                </div>
            </div>
        </div>
    </div>
    
</body>