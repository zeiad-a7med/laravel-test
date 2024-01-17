<style>
    * {
        font-family: Nunito, sans-serif;
    }

    body {
        margin: 0;
        padding: 0;
    }

    .headnav {
        background-color: #1c303f;
        display: flex;
        justify-content: space-around;
        height: 100px;
        color: white;
    }


    .headnav .logo {
        width: 90px;
        margin: 5px;


    }

    .headnav .right {
        height: 80%;
        width: 300px;
        margin-top: 20px;

    }

    .headnav .right img {
        width: 20px;
        margin-right: 10px;
        margin-top: 0px;
        margin-left: 30px
    }

    .headnav .right .email,
    .phone {
        width: 100%;
        height: 45%;
    }

    .headnav .right img,
    .p {
        float: right;
    }

    .headnav .right .p {}

    /*
    .headnav .right .phone{
        width: 100%;
        height:30px;
        display: block;
        background: blue;
    }
    .headnav .le{
        display: inline-block;
        padding-top: 5px;
        height:100%;
    }
    .headnav .ri{
        height:100%;
        display: inline-block;
    }
    
    
    
     */
</style>
<style>
    .topnav {
        background-color: #64798b;
        padding-bottom: 3px;
        justify-content: center;
        display: flex;

    }

    .topnav .navitem {
        display: inline-block;
        transition: 1s;
        cursor: pointer;
    }

    .topnav a {
        display: inline-block;
        color: white;
        text-align: center;
        padding: 14px 36px;
        text-decoration: none;
        font-size: 17px;

    }

    .topnav .navitem:hover {
        background-color: #1c303f;
        color: white;
    }

    .topnav a.active {
        background-color: #00A7E0;
        color: white;
    }

    .topnav .icon {
        display: none;
    }

    @media screen and (max-width: 700px) {
        .headnav {
            height: 100px;
        }

        .topnav a.icon {
            float: right;
            display: block;
        }

        .topnav {
            justify-content: end;

        }

        .topnav .navitem {
            display: none;
        }

        .topnav.responsive {
            display: block;
            position: relative;
        }

        .topnav.responsive .icon {
            position: absolute;
            right: 0;
            top: 0;
        }

        .topnav.responsive .navitem {
            display: block;
        }

        .topnav.responsive .navitem a {
            text-align: left
        }

        .topnav.responsive .navitem .dropbtn {
            margin-left: 20px;
        }
    }
</style>

<style>
    .dropbtn {

        color: white;
        padding: 16px;

        width: 100%;
        height: 100%;
        background: none;
        font-size: 16px;
        border: none;
    }

    .dropbtn a {
        width: 100%;
        height: 100%;
        margin: 0;
    }

    .dropup {
        width: 100%;
        height: 100%;
        position: relative;
        display: inline-block;
        transition: 0.8s;
    }

    .dropup-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 200px;
        top: 50px;
        z-index: 999;
        transition: 0.8s;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    .dropup-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        width: 100%;
        display: block;
    }

    .dropup-content a:hover {
        background-color: #1c303f;
        color: white;

    }

    .dropup:hover .dropup-content {
        display: block;
    }

    /* .dropup:hover .dropbtn {

        background-color: #ddd;
        color: black;
    } */


    //for_sub_drob


    .sub-dropup {

        !important position: relative;
        color: white;
        text-decoration: none;
        width: 100%;
        display: block;
    }

    .sub-dropup-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 200px;
        left: 200px;
        z-index: 999;

        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
        border-top-right-radius: 10px;
    }



    .sub-dropup-content a:hover {
        background-color: #ccc
    }

    .sub-dropup:hover .sub-dropup-content {
        display: block;
        position: absolute;
        margin-top: -50px;
    }

    .sub-dropup-content a:hover {
        background-color: #1c303f;
        color: white;
    }

    @media screen and (max-width:700px) {
        .navitem {
            height: 70px
        }
    }
</style>

<div class="topnav" id="myTopnav" style="position: relative">
    <div class="navitem">
        <a href="">{{ __('lang.home') }}</a>
    </div>
    <div class="navitem">
        <div class="dropup">
            <div class="dropbtn">{{ __('lang.language') }}</div>
            <div class="dropup-content">
                @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <a class="nav-link" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        {{ $properties['native'] }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
    </a>
</div>


<script>
    function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }
</script>
