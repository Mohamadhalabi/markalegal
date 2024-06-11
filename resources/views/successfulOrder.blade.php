<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
</head>
<style>
    body {
        text-align: center;
        background: transparent;
        overflow: visible;
    }
    h2 {
        color: #88B04B;
        font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
        font-weight: 900;
        font-size: 25px;
        margin-bottom: 10px;
    }
    p {
        color: #404F5E;
        font-size:18px;
        text-align: left;
        line-height: 30px;
        font-family: "Cabin", "Geneva", "Verdana", "sans-serif";
    }
    .icon{
        color: #9ABC66;
        font-size: 100px;
        line-height: 0px;
    }
    .card {
        background: transparent;
        padding: 60px;
        border-radius: 4px;
        display: inline-block;
    }
    .bold{
        font-weight: bold;
    }
    button{
        background-color: #ca786d;
        border-radius: 10px;
        border: transparent;
        color: white !important;
        font-size: 18px;
        font-weight: 600;
        padding: 15px 20px;
        margin-top: 0px !important;
    }
</style>
<body>
<div class="card">
    <div style="border-radius:200px; height:50px; width:300px; background: transparent; margin:0 auto;">
        <span class="icon">✅</span>
    </div>
    <h2>SIPARIŞ ALINDI</h2><br>
    <p>Sayın <span class="bold">{{$name}}</span>,<br><br>
        <span class="bold">{{$marka}}</span> markanız için başvuru talebiniz alınmıştır.<br><br>Marka uzmanımız sizle en kısa süre içerisinde iletişime geçecektir.<br><br>Teşekkür ederiz.
        <br>Saygılarımızla.<br></p>
</div>
</body>
</html>
