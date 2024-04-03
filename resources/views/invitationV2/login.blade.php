<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"/> -->

    <style>

     .form{
        padding: 1rem 0;
     }
     .form .sigin{
        display: flex;
        flex-direction: column;

       max-width: 80%;
       margin: 0 auto;
     }
     .form h2 {
        text-align: center;
        margin-bottom: .5rem;
     }
     .sigin input{
        width: 100%;
        border: 1px solid rgba(22, 68, 194, 0.18);
        padding: 1rem;
     }
     .btn {
        margin-top: 2rem;
     }
     .info{
        padding: 1rem 0;
     }
     label{
        margin-bottom: 8px;
     }
     .info div{
       padding: 0 4rem;
        gap: 4px;

     }
     .info :nth-child(1){
        border-left: 2px solid rgba(22, 68, 194, 0.39);
     }
     .otp{
        display: flex;
       justify-content: center;
       align-items: center;

     }
     .otp input{
        width: 10%;
        margin-left: 8px;
        border: rgba(22, 68, 194, 0.18) 1px solid;
        height: 54px;
        width: 62px;
        outline:none;
        font-size:2rem;
        text-align: center;
        color:#1644C2 ;
     }
     .container_otp{
        display: none;
     }
     .container_otp .btn{
        padding: 8px 2rem;

     }
     .btn span {
        color: #ffffff81;
     }
     section{
        display: flex;
        flex-direction: column;
        justify-content: space-between;
     }


.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 5px 10px;
  z-index: 1;
}

.dropdown:hover .dropdown-content {
  display: block;
}

.form-group {
    align-items: center;
    display: flex;
    border: 1px solid #ffffff;
    padding: 5px;
    border-radius: 6px;
    width: auto;
    background-color: white;
    align-content: center;
    justify-content: space-evenly;
    align-items: center;}
.form-group:focus {
  color: #212529;
    background-color: #fff;
    border-color: #86b7fe;
    outline: 0;
    box-shadow: 0 0 0 0.25rem rgb(13 110 253 / 25%);
}
.form-group input {
  display: inline-block;
  width: auto;
  border: none;
  width: 90% !important;
}
.spannumber{border-right:1px solid #585858;padding-right:2px ;}
.form-group input:focus-visible {
  box-shadow: none;
  border: none;
  border:0px solid brown;

  width: 30px;

}

    </style>
</head>
<body>
    <header>
        <div class="wrap">
            <div class="df ai-c jc-sb">
                <div class="df ai-c g0">
                   <img src="assets/logo.webp" alt="" width="40px " height="40px">


                 </div>

                <div class="dropdown df ai-c" style="display: flex;">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.66675 6.6665L8.00008 9.99984L11.3334 6.6665" stroke="#1644C2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>EN

                    <div class="dropdown-content" style="top: 16px; left: 0px;">
                      <a href="">عربي</a>
                      <a href="">نجليزي</a>
                    </div>
                </div>


            </div>
        </div>
    </header>
    <section>
        <img class="mc" src="assets/login.svg" alt="">
        <div class="form">
            <form class=sigin>
                <h2>تسجيل الدخول</h2>
                <label for="phone">يرجي ادخال  رقم الهاتف بدون 0</label>
                <!-- <input type="text " id="phone" placeholder="مثال 55799XXXX" required style="text-align: left;" > -->
                        <div class="form-group mt-2 d-inline-block">
                          <input id="phone" type="text"  id="ec-mobile-number" aria-describedby="emailHelp" placeholder="91257888" style="text-align: left;" />
                          <span class="spannumber border-end country-code px-2">966+</span>
                        </div>
                    </div>
                </div>
                <input class="btn" type="submit" value="تسجيل الدخول" onclick="signin(event)">
            </form>
            <div class="container_otp">
                <h2>الرجاء ادخل رمز المرسل الى الهاتف</h2>
                <form class="otp" dir="ltr">
                    <input type="text" id="fourth" maxlength="1">
                    <input type="text" id="third" maxlength="1" onkeyup="clickEvent(this,'fourth')">
                    <input type="text" id="sec" maxlength="1" onkeyup="clickEvent(this,'third')">
                    <input type="text" id='ist' maxlength="1" onkeyup="clickEvent(this,'sec')">
                </form>
                <div class="df jc-c g1">
                    <input class="btn" type="submit" value="دخول" onclick="login()" >
                <div class="btn" id="otpButton" onclick="startCountdown()">

                    <span>
                        اعادة ارسال رمز
                    </span>
                    <span id="countdown"></span>
                </div>
            </div>

           </div>
        </div>
        <div class="info df jc-c ">
            <div class="df f-c  ai-c">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.0771 3.0527C10.3035 3.0527 10.5249 2.98557 10.7131 2.85981C10.9014 2.73406 11.0482 2.55531 11.1349 2.34616C11.2216 2.13701 11.2443 1.90685 11.2002 1.68478C11.1561 1.4627 11.0472 1.25868 10.8872 1.0985C10.7272 0.93832 10.5233 0.82917 10.3013 0.784849C10.0792 0.740528 9.84907 0.763025 9.63982 0.849495C9.43058 0.935966 9.25167 1.08253 9.1257 1.27066C8.99974 1.45879 8.93238 1.68004 8.93213 1.90645C8.93213 2.21023 9.05272 2.5016 9.26742 2.71653C9.48211 2.93145 9.77334 3.05236 10.0771 3.0527ZM10.0771 1.08176C10.2406 1.08194 10.4003 1.1306 10.5361 1.22157C10.6719 1.31254 10.7776 1.44174 10.84 1.59283C10.9023 1.74391 10.9184 1.91009 10.8863 2.07035C10.8542 2.23061 10.7753 2.37774 10.6596 2.49314C10.5438 2.60854 10.3964 2.68701 10.2361 2.71864C10.0757 2.75027 9.90959 2.73363 9.7587 2.67082C9.6078 2.60802 9.47892 2.50187 9.38836 2.36581C9.2978 2.22975 9.24963 2.06989 9.24994 1.90645C9.25052 1.68747 9.33794 1.47767 9.49301 1.32306C9.64808 1.16845 9.85815 1.08167 10.0771 1.08176Z" fill="#1644C2"/>
                    <path d="M5.92276 3.0527C6.14918 3.05276 6.37054 2.98569 6.55885 2.85997C6.74716 2.73425 6.89396 2.55552 6.98071 2.34637C7.06746 2.13723 7.09025 1.90706 7.0462 1.68497C7.00216 1.46287 6.89326 1.25882 6.73326 1.09861C6.57327 0.938399 6.36937 0.829219 6.14734 0.784872C5.9253 0.740526 5.6951 0.763004 5.48584 0.849466C5.27658 0.935927 5.09765 1.08249 4.97167 1.27063C4.84569 1.45876 4.77832 1.68003 4.77808 1.90645C4.77808 2.21018 4.89863 2.5015 5.11325 2.71641C5.32788 2.93133 5.61903 3.05228 5.92276 3.0527ZM5.92276 1.08176C6.08626 1.0817 6.2461 1.13014 6.38205 1.22096C6.518 1.31178 6.62395 1.4409 6.68649 1.59196C6.74903 1.74302 6.76534 1.90925 6.73337 2.06959C6.7014 2.22993 6.62258 2.37718 6.50688 2.4927C6.39118 2.60822 6.24381 2.68682 6.08342 2.71855C5.92304 2.75028 5.75684 2.73371 5.60587 2.67094C5.4549 2.60818 5.32595 2.50203 5.23534 2.36594C5.14472 2.22985 5.09652 2.06994 5.09683 1.90645C5.09741 1.68769 5.18465 1.47807 5.33945 1.3235C5.49426 1.16893 5.704 1.08201 5.92276 1.08176Z" fill="#1644C2"/>
                    <path d="M14.805 6.92898H14.3841C14.3519 6.48601 14.1887 6.06261 13.9153 5.71257C13.642 5.36253 13.2707 5.10164 12.8488 4.96304C13.0777 4.81341 13.2522 4.59385 13.3463 4.33706C13.4404 4.08026 13.449 3.79995 13.3709 3.53783C13.2929 3.27572 13.1323 3.04582 12.913 2.88235C12.6938 2.71888 12.4276 2.63057 12.1541 2.63057C11.8806 2.63057 11.6144 2.71888 11.3952 2.88235C11.1759 3.04582 11.0153 3.27572 10.9372 3.53783C10.8592 3.79995 10.8678 4.08026 10.9619 4.33706C11.056 4.59385 11.2305 4.81341 11.4594 4.96304C11.1483 5.06556 10.8635 5.23484 10.6247 5.45902C10.386 5.6832 10.1991 5.95687 10.0772 6.26086C9.95528 5.95685 9.76836 5.68317 9.52955 5.45899C9.29074 5.2348 9.00581 5.06554 8.69471 4.96304C8.92373 4.8134 9.0983 4.5938 9.19245 4.33693C9.2866 4.08007 9.29528 3.79967 9.21721 3.53747C9.13914 3.27527 8.9785 3.04529 8.75918 2.88176C8.53986 2.71822 8.2736 2.62988 8.00002 2.62988C7.72645 2.62988 7.46018 2.71822 7.24086 2.88176C7.02155 3.04529 6.8609 3.27527 6.78283 3.53747C6.70476 3.79967 6.71344 4.08007 6.80759 4.33693C6.90174 4.5938 7.07631 4.8134 7.30533 4.96304C6.99423 5.06554 6.7093 5.2348 6.47049 5.45899C6.23168 5.68317 6.04476 5.95685 5.92283 6.26086C5.80095 5.95687 5.61409 5.6832 5.37533 5.45902C5.13658 5.23484 4.8517 5.06556 4.54065 4.96304C4.76966 4.8134 4.94424 4.5938 5.03839 4.33693C5.13253 4.08007 5.14122 3.79967 5.06315 3.53747C4.98508 3.27527 4.82443 3.04529 4.60511 2.88176C4.3858 2.71822 4.11953 2.62988 3.84596 2.62988C3.57238 2.62988 3.30612 2.71822 3.0868 2.88176C2.86748 3.04529 2.70683 3.27527 2.62877 3.53747C2.5507 3.79967 2.55938 4.08007 2.65353 4.33693C2.74768 4.5938 2.92225 4.8134 3.15127 4.96304C2.72931 5.10164 2.35806 5.36253 2.0847 5.71257C1.81133 6.06261 1.64817 6.48601 1.61596 6.92898H1.19502C1.15275 6.92898 1.11221 6.94577 1.08232 6.97566C1.05244 7.00555 1.03564 7.04609 1.03564 7.08835C1.03564 7.13062 1.05244 7.17116 1.08232 7.20105C1.11221 7.23094 1.15275 7.24773 1.19502 7.24773H11.1638C10.9601 7.40037 10.796 7.59955 10.6851 7.82862C10.5743 8.05769 10.5198 8.30998 10.5265 8.56438C10.5331 8.81879 10.6005 9.06791 10.7231 9.29091C10.8457 9.51391 11.02 9.70431 11.2313 9.84617C10.7173 9.94312 10.2416 10.1846 9.86002 10.5424L8.3619 11.944L6.60783 10.2293C6.27189 9.90086 5.74346 9.89835 5.39315 10.2318C5.30905 10.3121 5.24197 10.4086 5.1959 10.5154C5.14983 10.6221 5.12571 10.7371 5.12498 10.8534C5.12425 10.9697 5.14693 11.085 5.19165 11.1923C5.23638 11.2997 5.30225 11.397 5.38533 11.4784L7.38127 13.3937C7.64223 13.642 7.98693 13.7834 8.34713 13.7897C8.70733 13.796 9.05678 13.6668 9.32627 13.4277L10.2285 12.6202L10.291 15.0815C10.2918 15.1232 10.3089 15.1629 10.3387 15.1922C10.3685 15.2214 10.4086 15.2377 10.4503 15.2377H10.4544C10.4754 15.2373 10.4961 15.2328 10.5154 15.2243C10.5346 15.2159 10.552 15.2037 10.5665 15.1885C10.581 15.1733 10.5924 15.1554 10.6 15.1358C10.6076 15.1162 10.6112 15.0953 10.6106 15.0743L10.5394 12.2687C10.5386 12.2382 10.5292 12.2087 10.5121 12.1835C10.4951 12.1583 10.4712 12.1385 10.4432 12.1264C10.4153 12.1143 10.3845 12.1105 10.3545 12.1154C10.3244 12.1203 10.2964 12.1337 10.2738 12.154L9.1144 13.1912C8.90494 13.3769 8.63337 13.4773 8.35344 13.4724C8.07351 13.4675 7.80563 13.3576 7.60283 13.1646L5.60815 11.2496C5.55563 11.1982 5.51407 11.1367 5.48598 11.0688C5.45789 11.0009 5.44385 10.9281 5.44471 10.8546C5.44645 10.7464 5.47963 10.641 5.54019 10.5512C5.60075 10.4615 5.68609 10.3913 5.78582 10.3492C5.88555 10.3071 5.99537 10.2948 6.10192 10.314C6.20847 10.3332 6.30715 10.3829 6.38596 10.4571L8.25002 12.2787C8.27928 12.3069 8.31823 12.3229 8.3589 12.3234C8.39957 12.3238 8.43887 12.3087 8.46877 12.2812L10.0781 10.7752C10.5298 10.3514 11.1262 10.1159 11.7456 10.1168H12.6C13.073 10.1173 13.5265 10.3054 13.861 10.6399C14.1955 10.9743 14.3836 11.4278 14.3841 11.9009V15.0774C14.3841 15.1197 14.4009 15.1602 14.4308 15.1901C14.4607 15.22 14.5012 15.2368 14.5435 15.2368C14.5857 15.2368 14.6263 15.22 14.6562 15.1901C14.686 15.1602 14.7028 15.1197 14.7028 15.0774V11.9009C14.7024 11.4152 14.5342 10.9447 14.2267 10.5688C13.9192 10.1929 13.4913 9.9349 13.0153 9.83835C13.2251 9.69578 13.3977 9.50515 13.5189 9.28235C13.6401 9.05955 13.7063 8.81103 13.712 8.55747C13.7178 8.30391 13.6628 8.05265 13.5518 7.82462C13.4408 7.59658 13.2769 7.39837 13.0738 7.24648H14.8035C14.8244 7.24648 14.8451 7.24236 14.8644 7.23435C14.8838 7.22634 14.9014 7.2146 14.9162 7.1998C14.931 7.185 14.9427 7.16743 14.9507 7.14809C14.9587 7.12876 14.9628 7.10804 14.9628 7.08711C14.9628 7.06618 14.9587 7.04545 14.9507 7.02611C14.9427 7.00678 14.931 6.98921 14.9162 6.97441C14.9014 6.95961 14.8838 6.94787 14.8644 6.93986C14.8451 6.93185 14.8244 6.92773 14.8035 6.92773L14.805 6.92898ZM11.2031 3.90086C11.2031 3.7127 11.2589 3.52878 11.3635 3.37234C11.468 3.2159 11.6166 3.09397 11.7904 3.02199C11.9643 2.95 12.1556 2.93118 12.3401 2.96791C12.5246 3.00464 12.6941 3.09526 12.8271 3.22833C12.9602 3.3614 13.0507 3.53092 13.0874 3.71547C13.1241 3.90001 13.1052 4.09129 13.0331 4.2651C12.9611 4.43891 12.8391 4.58746 12.6827 4.69194C12.5262 4.79643 12.3422 4.85217 12.1541 4.85211C11.9019 4.85177 11.6602 4.75144 11.4819 4.57311C11.3037 4.39478 11.2034 4.15301 11.2031 3.90086ZM7.04877 3.90086C7.04877 3.71272 7.10456 3.5288 7.20908 3.37237C7.31361 3.21594 7.46217 3.09401 7.63599 3.02202C7.80981 2.95002 8.00108 2.93118 8.1856 2.96788C8.37012 3.00459 8.53962 3.09519 8.67266 3.22822C8.80569 3.36125 8.89629 3.53075 8.93299 3.71528C8.9697 3.8998 8.95086 4.09106 8.87886 4.26488C8.80686 4.4387 8.68494 4.58727 8.52851 4.69179C8.37207 4.79632 8.18816 4.85211 8.00002 4.85211C7.74783 4.85177 7.50607 4.75145 7.32775 4.57313C7.14943 4.3948 7.0491 4.15304 7.04877 3.90086ZM8.00002 5.17086C8.4808 5.17142 8.94386 5.35237 9.29765 5.67791C9.65143 6.00346 9.87018 6.44991 9.91065 6.92898H6.0894C6.12986 6.44991 6.34861 6.00346 6.70239 5.67791C7.05618 5.35237 7.51924 5.17142 8.00002 5.17086ZM2.89471 3.90086C2.89471 3.71272 2.9505 3.5288 3.05502 3.37237C3.15955 3.21594 3.30811 3.09401 3.48193 3.02202C3.65575 2.95002 3.84701 2.93118 4.03154 2.96788C4.21606 3.00459 4.38556 3.09519 4.51859 3.22822C4.65163 3.36125 4.74223 3.53075 4.77893 3.71528C4.81563 3.8998 4.7968 4.09106 4.7248 4.26488C4.6528 4.4387 4.53088 4.58727 4.37444 4.69179C4.21801 4.79632 4.0341 4.85211 3.84596 4.85211C3.59375 4.85186 3.35194 4.75156 3.1736 4.57322C2.99526 4.39488 2.89496 4.15307 2.89471 3.90086ZM3.84596 5.17086C4.3267 5.17143 4.78973 5.35238 5.14346 5.67794C5.4972 6.00349 5.71588 6.44994 5.75627 6.92898H1.93533C1.97586 6.44994 2.19464 6.00353 2.54841 5.67799C2.90218 5.35246 3.3652 5.17149 3.84596 5.17086ZM13.3953 8.52304C13.3953 8.77528 13.3205 9.02184 13.1804 9.23157C13.0403 9.44129 12.8411 9.60475 12.6081 9.70128C12.375 9.7978 12.1186 9.82306 11.8712 9.77385C11.6238 9.72464 11.3966 9.60318 11.2182 9.42482C11.0399 9.24647 10.9184 9.01923 10.8692 8.77184C10.82 8.52446 10.8453 8.26803 10.9418 8.035C11.0383 7.80197 11.2018 7.60279 11.4115 7.46266C11.6212 7.32253 11.8678 7.24773 12.12 7.24773C12.4582 7.24806 12.7823 7.38253 13.0214 7.62163C13.2605 7.86072 13.395 8.18491 13.3953 8.52304ZM10.2438 6.92929C10.284 6.45027 10.5027 6.00383 10.8565 5.67844C11.2104 5.35306 11.6735 5.17247 12.1542 5.17247C12.6349 5.17247 13.0981 5.35306 13.452 5.67844C13.8058 6.00383 14.0245 6.45027 14.0647 6.92929H10.2438Z" fill="#1644C2"/>
                    </svg>
                    <span>10,000</span>
                    <span>مشارك</span>

            </div>
            <div class="df f-c g0 ai-c">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.0771 3.0527C10.3035 3.0527 10.5249 2.98557 10.7131 2.85981C10.9014 2.73406 11.0482 2.55531 11.1349 2.34616C11.2216 2.13701 11.2443 1.90685 11.2002 1.68478C11.1561 1.4627 11.0472 1.25868 10.8872 1.0985C10.7272 0.93832 10.5233 0.82917 10.3013 0.784849C10.0792 0.740528 9.84907 0.763025 9.63982 0.849495C9.43058 0.935966 9.25167 1.08253 9.1257 1.27066C8.99974 1.45879 8.93238 1.68004 8.93213 1.90645C8.93213 2.21023 9.05272 2.5016 9.26742 2.71653C9.48211 2.93145 9.77334 3.05236 10.0771 3.0527ZM10.0771 1.08176C10.2406 1.08194 10.4003 1.1306 10.5361 1.22157C10.6719 1.31254 10.7776 1.44174 10.84 1.59283C10.9023 1.74391 10.9184 1.91009 10.8863 2.07035C10.8542 2.23061 10.7753 2.37774 10.6596 2.49314C10.5438 2.60854 10.3964 2.68701 10.2361 2.71864C10.0757 2.75027 9.90959 2.73363 9.7587 2.67082C9.6078 2.60802 9.47892 2.50187 9.38836 2.36581C9.2978 2.22975 9.24963 2.06989 9.24994 1.90645C9.25052 1.68747 9.33794 1.47767 9.49301 1.32306C9.64808 1.16845 9.85815 1.08167 10.0771 1.08176Z" fill="#1644C2"/>
                <path d="M5.92276 3.0527C6.14918 3.05276 6.37054 2.98569 6.55885 2.85997C6.74716 2.73425 6.89396 2.55552 6.98071 2.34637C7.06746 2.13723 7.09025 1.90706 7.0462 1.68497C7.00216 1.46287 6.89326 1.25882 6.73326 1.09861C6.57327 0.938399 6.36937 0.829219 6.14734 0.784872C5.9253 0.740526 5.6951 0.763004 5.48584 0.849466C5.27658 0.935927 5.09765 1.08249 4.97167 1.27063C4.84569 1.45876 4.77832 1.68003 4.77808 1.90645C4.77808 2.21018 4.89863 2.5015 5.11325 2.71641C5.32788 2.93133 5.61903 3.05228 5.92276 3.0527ZM5.92276 1.08176C6.08626 1.0817 6.2461 1.13014 6.38205 1.22096C6.518 1.31178 6.62395 1.4409 6.68649 1.59196C6.74903 1.74302 6.76534 1.90925 6.73337 2.06959C6.7014 2.22993 6.62258 2.37718 6.50688 2.4927C6.39118 2.60822 6.24381 2.68682 6.08342 2.71855C5.92304 2.75028 5.75684 2.73371 5.60587 2.67094C5.4549 2.60818 5.32595 2.50203 5.23534 2.36594C5.14472 2.22985 5.09652 2.06994 5.09683 1.90645C5.09741 1.68769 5.18465 1.47807 5.33945 1.3235C5.49426 1.16893 5.704 1.08201 5.92276 1.08176Z" fill="#1644C2"/>
                <path d="M14.805 6.92898H14.3841C14.3519 6.48601 14.1887 6.06261 13.9153 5.71257C13.642 5.36253 13.2707 5.10164 12.8488 4.96304C13.0777 4.81341 13.2522 4.59385 13.3463 4.33706C13.4404 4.08026 13.449 3.79995 13.3709 3.53783C13.2929 3.27572 13.1323 3.04582 12.913 2.88235C12.6938 2.71888 12.4276 2.63057 12.1541 2.63057C11.8806 2.63057 11.6144 2.71888 11.3952 2.88235C11.1759 3.04582 11.0153 3.27572 10.9372 3.53783C10.8592 3.79995 10.8678 4.08026 10.9619 4.33706C11.056 4.59385 11.2305 4.81341 11.4594 4.96304C11.1483 5.06556 10.8635 5.23484 10.6247 5.45902C10.386 5.6832 10.1991 5.95687 10.0772 6.26086C9.95528 5.95685 9.76836 5.68317 9.52955 5.45899C9.29074 5.2348 9.00581 5.06554 8.69471 4.96304C8.92373 4.8134 9.0983 4.5938 9.19245 4.33693C9.2866 4.08007 9.29528 3.79967 9.21721 3.53747C9.13914 3.27527 8.9785 3.04529 8.75918 2.88176C8.53986 2.71822 8.2736 2.62988 8.00002 2.62988C7.72645 2.62988 7.46018 2.71822 7.24086 2.88176C7.02155 3.04529 6.8609 3.27527 6.78283 3.53747C6.70476 3.79967 6.71344 4.08007 6.80759 4.33693C6.90174 4.5938 7.07631 4.8134 7.30533 4.96304C6.99423 5.06554 6.7093 5.2348 6.47049 5.45899C6.23168 5.68317 6.04476 5.95685 5.92283 6.26086C5.80095 5.95687 5.61409 5.6832 5.37533 5.45902C5.13658 5.23484 4.8517 5.06556 4.54065 4.96304C4.76966 4.8134 4.94424 4.5938 5.03839 4.33693C5.13253 4.08007 5.14122 3.79967 5.06315 3.53747C4.98508 3.27527 4.82443 3.04529 4.60511 2.88176C4.3858 2.71822 4.11953 2.62988 3.84596 2.62988C3.57238 2.62988 3.30612 2.71822 3.0868 2.88176C2.86748 3.04529 2.70683 3.27527 2.62877 3.53747C2.5507 3.79967 2.55938 4.08007 2.65353 4.33693C2.74768 4.5938 2.92225 4.8134 3.15127 4.96304C2.72931 5.10164 2.35806 5.36253 2.0847 5.71257C1.81133 6.06261 1.64817 6.48601 1.61596 6.92898H1.19502C1.15275 6.92898 1.11221 6.94577 1.08232 6.97566C1.05244 7.00555 1.03564 7.04609 1.03564 7.08835C1.03564 7.13062 1.05244 7.17116 1.08232 7.20105C1.11221 7.23094 1.15275 7.24773 1.19502 7.24773H11.1638C10.9601 7.40037 10.796 7.59955 10.6851 7.82862C10.5743 8.05769 10.5198 8.30998 10.5265 8.56438C10.5331 8.81879 10.6005 9.06791 10.7231 9.29091C10.8457 9.51391 11.02 9.70431 11.2313 9.84617C10.7173 9.94312 10.2416 10.1846 9.86002 10.5424L8.3619 11.944L6.60783 10.2293C6.27189 9.90086 5.74346 9.89835 5.39315 10.2318C5.30905 10.3121 5.24197 10.4086 5.1959 10.5154C5.14983 10.6221 5.12571 10.7371 5.12498 10.8534C5.12425 10.9697 5.14693 11.085 5.19165 11.1923C5.23638 11.2997 5.30225 11.397 5.38533 11.4784L7.38127 13.3937C7.64223 13.642 7.98693 13.7834 8.34713 13.7897C8.70733 13.796 9.05678 13.6668 9.32627 13.4277L10.2285 12.6202L10.291 15.0815C10.2918 15.1232 10.3089 15.1629 10.3387 15.1922C10.3685 15.2214 10.4086 15.2377 10.4503 15.2377H10.4544C10.4754 15.2373 10.4961 15.2328 10.5154 15.2243C10.5346 15.2159 10.552 15.2037 10.5665 15.1885C10.581 15.1733 10.5924 15.1554 10.6 15.1358C10.6076 15.1162 10.6112 15.0953 10.6106 15.0743L10.5394 12.2687C10.5386 12.2382 10.5292 12.2087 10.5121 12.1835C10.4951 12.1583 10.4712 12.1385 10.4432 12.1264C10.4153 12.1143 10.3845 12.1105 10.3545 12.1154C10.3244 12.1203 10.2964 12.1337 10.2738 12.154L9.1144 13.1912C8.90494 13.3769 8.63337 13.4773 8.35344 13.4724C8.07351 13.4675 7.80563 13.3576 7.60283 13.1646L5.60815 11.2496C5.55563 11.1982 5.51407 11.1367 5.48598 11.0688C5.45789 11.0009 5.44385 10.9281 5.44471 10.8546C5.44645 10.7464 5.47963 10.641 5.54019 10.5512C5.60075 10.4615 5.68609 10.3913 5.78582 10.3492C5.88555 10.3071 5.99537 10.2948 6.10192 10.314C6.20847 10.3332 6.30715 10.3829 6.38596 10.4571L8.25002 12.2787C8.27928 12.3069 8.31823 12.3229 8.3589 12.3234C8.39957 12.3238 8.43887 12.3087 8.46877 12.2812L10.0781 10.7752C10.5298 10.3514 11.1262 10.1159 11.7456 10.1168H12.6C13.073 10.1173 13.5265 10.3054 13.861 10.6399C14.1955 10.9743 14.3836 11.4278 14.3841 11.9009V15.0774C14.3841 15.1197 14.4009 15.1602 14.4308 15.1901C14.4607 15.22 14.5012 15.2368 14.5435 15.2368C14.5857 15.2368 14.6263 15.22 14.6562 15.1901C14.686 15.1602 14.7028 15.1197 14.7028 15.0774V11.9009C14.7024 11.4152 14.5342 10.9447 14.2267 10.5688C13.9192 10.1929 13.4913 9.9349 13.0153 9.83835C13.2251 9.69578 13.3977 9.50515 13.5189 9.28235C13.6401 9.05955 13.7063 8.81103 13.712 8.55747C13.7178 8.30391 13.6628 8.05265 13.5518 7.82462C13.4408 7.59658 13.2769 7.39837 13.0738 7.24648H14.8035C14.8244 7.24648 14.8451 7.24236 14.8644 7.23435C14.8838 7.22634 14.9014 7.2146 14.9162 7.1998C14.931 7.185 14.9427 7.16743 14.9507 7.14809C14.9587 7.12876 14.9628 7.10804 14.9628 7.08711C14.9628 7.06618 14.9587 7.04545 14.9507 7.02611C14.9427 7.00678 14.931 6.98921 14.9162 6.97441C14.9014 6.95961 14.8838 6.94787 14.8644 6.93986C14.8451 6.93185 14.8244 6.92773 14.8035 6.92773L14.805 6.92898ZM11.2031 3.90086C11.2031 3.7127 11.2589 3.52878 11.3635 3.37234C11.468 3.2159 11.6166 3.09397 11.7904 3.02199C11.9643 2.95 12.1556 2.93118 12.3401 2.96791C12.5246 3.00464 12.6941 3.09526 12.8271 3.22833C12.9602 3.3614 13.0507 3.53092 13.0874 3.71547C13.1241 3.90001 13.1052 4.09129 13.0331 4.2651C12.9611 4.43891 12.8391 4.58746 12.6827 4.69194C12.5262 4.79643 12.3422 4.85217 12.1541 4.85211C11.9019 4.85177 11.6602 4.75144 11.4819 4.57311C11.3037 4.39478 11.2034 4.15301 11.2031 3.90086ZM7.04877 3.90086C7.04877 3.71272 7.10456 3.5288 7.20908 3.37237C7.31361 3.21594 7.46217 3.09401 7.63599 3.02202C7.80981 2.95002 8.00108 2.93118 8.1856 2.96788C8.37012 3.00459 8.53962 3.09519 8.67266 3.22822C8.80569 3.36125 8.89629 3.53075 8.93299 3.71528C8.9697 3.8998 8.95086 4.09106 8.87886 4.26488C8.80686 4.4387 8.68494 4.58727 8.52851 4.69179C8.37207 4.79632 8.18816 4.85211 8.00002 4.85211C7.74783 4.85177 7.50607 4.75145 7.32775 4.57313C7.14943 4.3948 7.0491 4.15304 7.04877 3.90086ZM8.00002 5.17086C8.4808 5.17142 8.94386 5.35237 9.29765 5.67791C9.65143 6.00346 9.87018 6.44991 9.91065 6.92898H6.0894C6.12986 6.44991 6.34861 6.00346 6.70239 5.67791C7.05618 5.35237 7.51924 5.17142 8.00002 5.17086ZM2.89471 3.90086C2.89471 3.71272 2.9505 3.5288 3.05502 3.37237C3.15955 3.21594 3.30811 3.09401 3.48193 3.02202C3.65575 2.95002 3.84701 2.93118 4.03154 2.96788C4.21606 3.00459 4.38556 3.09519 4.51859 3.22822C4.65163 3.36125 4.74223 3.53075 4.77893 3.71528C4.81563 3.8998 4.7968 4.09106 4.7248 4.26488C4.6528 4.4387 4.53088 4.58727 4.37444 4.69179C4.21801 4.79632 4.0341 4.85211 3.84596 4.85211C3.59375 4.85186 3.35194 4.75156 3.1736 4.57322C2.99526 4.39488 2.89496 4.15307 2.89471 3.90086ZM3.84596 5.17086C4.3267 5.17143 4.78973 5.35238 5.14346 5.67794C5.4972 6.00349 5.71588 6.44994 5.75627 6.92898H1.93533C1.97586 6.44994 2.19464 6.00353 2.54841 5.67799C2.90218 5.35246 3.3652 5.17149 3.84596 5.17086ZM13.3953 8.52304C13.3953 8.77528 13.3205 9.02184 13.1804 9.23157C13.0403 9.44129 12.8411 9.60475 12.6081 9.70128C12.375 9.7978 12.1186 9.82306 11.8712 9.77385C11.6238 9.72464 11.3966 9.60318 11.2182 9.42482C11.0399 9.24647 10.9184 9.01923 10.8692 8.77184C10.82 8.52446 10.8453 8.26803 10.9418 8.035C11.0383 7.80197 11.2018 7.60279 11.4115 7.46266C11.6212 7.32253 11.8678 7.24773 12.12 7.24773C12.4582 7.24806 12.7823 7.38253 13.0214 7.62163C13.2605 7.86072 13.395 8.18491 13.3953 8.52304ZM10.2438 6.92929C10.284 6.45027 10.5027 6.00383 10.8565 5.67844C11.2104 5.35306 11.6735 5.17247 12.1542 5.17247C12.6349 5.17247 13.0981 5.35306 13.452 5.67844C13.8058 6.00383 14.0245 6.45027 14.0647 6.92929H10.2438Z" fill="#1644C2"/>
                </svg>
                <span>250+</span>
                <span>دورة تدريبية</span>


            </div>
        </div>


            <div class="sociel_media">
                <a href="#"> <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <rect x="0.5" y="0.5" width="43" height="43" rx="11.5" stroke="#8AB7F4"/>
                     <path d="M27.0392 23.3039L27.6625 19.3469H23.8228V16.7748C23.8228 15.6928 24.3588 14.6355 26.073 14.6355H27.8433V11.2659C26.8124 11.1016 25.7707 11.0127 24.7266 11C21.5663 11 19.5031 12.8981 19.5031 16.3296V19.3469H16V23.3039H19.5031V32.875H23.8228V23.3039H27.0392Z" fill="#0063E6"/>
                 </svg></a>
                <a href="#"> <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                         <rect x="0.5" y="0.5" width="43" height="43" rx="11.5" stroke="#8AB7F4"/>
                         <path d="M22.7218 16.9799C24.4989 16.9799 25.6977 17.7475 26.3812 18.389L29.0521 15.781C27.4117 14.2562 25.277 13.3203 22.7218 13.3203C19.0203 13.3203 15.8236 15.4445 14.2673 18.5362L17.3273 20.9128C18.095 18.6309 20.2191 16.9799 22.7218 16.9799Z" fill="#0063E6"/>
                         <path d="M31.8071 22.995C31.8071 22.2168 31.744 21.649 31.6073 21.0601H22.7218V24.5724H27.9374C27.8323 25.4452 27.2644 26.7597 26.0026 27.6431L28.989 29.9566C30.7766 28.3056 31.8071 25.8764 31.8071 22.995Z" fill="#0063E6"/>
                         <path d="M17.3378 24.6565C17.138 24.0676 17.0224 23.4367 17.0224 22.7847C17.0224 22.1327 17.138 21.5017 17.3273 20.9128L14.2673 18.5362C13.6259 19.8192 13.2578 21.2598 13.2578 22.7847C13.2578 24.3095 13.6259 25.7502 14.2673 27.0331L17.3378 24.6565Z" fill="#0063E6"/>
                         <path d="M22.7217 32.249C25.277 32.249 27.4222 31.4078 28.989 29.9566L26.0026 27.6431C25.2034 28.2004 24.1308 28.5895 22.7217 28.5895C20.219 28.5895 18.0949 26.9385 17.3378 24.6565L14.2778 27.0331C15.8341 30.1248 19.0203 32.249 22.7217 32.249Z" fill="#0063E6"/>
                         <path d="M22.464 16.6596C24.2411 16.6596 25.4398 17.4272 26.1233 18.0687L28.7943 15.4607C27.1539 13.9359 25.0192 13 22.464 13C18.7625 13 15.5658 15.1242 14.0095 18.2159L17.0695 20.5925C17.8371 18.3106 19.9613 16.6596 22.464 16.6596Z" fill="#0063E6"/>
                         <path d="M31.5493 22.6747C31.5493 21.8965 31.4862 21.3286 31.3495 20.7397H22.4639V24.2521H27.6796C27.5745 25.1249 27.0066 26.4394 25.7448 27.3227L28.7312 29.6363C30.5188 27.9853 31.5493 25.5561 31.5493 22.6747Z" fill="#0063E6"/>
                         <path d="M17.08 24.3362C16.8802 23.7473 16.7645 23.1163 16.7645 22.4644C16.7645 21.8124 16.8802 21.1814 17.0695 20.5925L14.0095 18.2159C13.3681 19.4989 13 20.9395 13 22.4644C13 23.9892 13.368 25.4299 14.0095 26.7128L17.08 24.3362Z" fill="#0063E6"/>
                         <path d="M22.4639 31.9287C25.0192 31.9287 27.1644 31.0875 28.7312 29.6363L25.7448 27.3227C24.9456 27.8801 23.873 28.2692 22.4639 28.2692C19.9612 28.2692 17.8371 26.6182 17.08 24.3362L14.02 26.7128C15.5763 29.8045 18.7625 31.9287 22.4639 31.9287Z" fill="#0063E6"/>
                 </svg></a>
                 <a href="#"><svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <rect x="0.5" y="0.5" width="43" height="43" rx="11.5" stroke="#8AB7F4"/>
                     <path d="M17.6348 21.9458C17.6348 19.7467 19.418 17.9635 21.6183 17.9635C23.8185 17.9635 25.6027 19.7467 25.6027 21.9458C25.6027 24.1449 23.8185 25.9281 21.6183 25.9281C19.418 25.9281 17.6348 24.1449 17.6348 21.9458ZM15.4809 21.9458C15.4809 25.3336 18.2286 28.0798 21.6183 28.0798C25.0079 28.0798 27.7556 25.3336 27.7556 21.9458C27.7556 18.558 25.0079 15.8118 21.6183 15.8118C18.2286 15.8118 15.4809 18.558 15.4809 21.9458ZM26.5643 15.5686C26.5642 15.8521 26.6482 16.1293 26.8057 16.3651C26.9632 16.6009 27.1871 16.7847 27.4492 16.8933C27.7112 17.0019 27.9996 17.0304 28.2778 16.9752C28.5561 16.92 28.8117 16.7836 29.0124 16.5832C29.213 16.3828 29.3497 16.1274 29.4052 15.8494C29.4606 15.5713 29.4323 15.2831 29.3239 15.0211C29.2154 14.7591 29.0317 14.5352 28.7959 14.3775C28.5601 14.2199 28.2828 14.1357 27.9992 14.1356H27.9986C27.6183 14.1358 27.2537 14.2868 26.9848 14.5555C26.7159 14.8242 26.5646 15.1885 26.5643 15.5686ZM16.7896 31.6694C15.6243 31.6164 14.9909 31.4224 14.57 31.2585C14.012 31.0413 13.6138 30.7827 13.1952 30.3649C12.7766 29.9471 12.5174 29.5495 12.3012 28.9918C12.1371 28.5713 11.943 27.9381 11.89 26.7734C11.8321 25.5143 11.8205 25.136 11.8205 21.9459C11.8205 18.7558 11.833 18.3786 11.89 17.1184C11.9431 15.9537 12.1386 15.3217 12.3012 14.9C12.5184 14.3423 12.7771 13.9443 13.1952 13.5259C13.6132 13.1075 14.011 12.8485 14.57 12.6324C14.9907 12.4684 15.6243 12.2744 16.7896 12.2214C18.0494 12.1635 18.4279 12.152 21.6183 12.152C24.8087 12.152 25.1875 12.1645 26.4484 12.2214C27.6137 12.2745 28.246 12.4699 28.668 12.6324C29.226 12.8485 29.6242 13.1081 30.0428 13.5259C30.4614 13.9437 30.7196 14.3423 30.9368 14.9C31.1009 15.3205 31.295 15.9537 31.348 17.1184C31.4059 18.3786 31.4175 18.7558 31.4175 21.9459C31.4175 25.136 31.4059 25.5132 31.348 26.7734C31.2949 27.9381 31.0999 28.5711 30.9368 28.9918C30.7196 29.5495 30.4608 29.9475 30.0428 30.3649C29.6248 30.7823 29.226 31.0413 28.668 31.2585C28.2473 31.4225 27.6137 31.6165 26.4484 31.6694C25.1886 31.7273 24.8101 31.7389 21.6183 31.7389C18.4264 31.7389 18.049 31.7273 16.7896 31.6694ZM16.6906 10.0723C15.4182 10.1303 14.5488 10.3319 13.7895 10.6272C13.0031 10.9322 12.3374 11.3413 11.6722 12.0051C11.007 12.6689 10.5987 13.3353 10.2936 14.1212C9.9981 14.8806 9.79634 15.7491 9.7384 17.0208C9.6795 18.2945 9.66602 18.7017 9.66602 21.9458C9.66602 25.1899 9.6795 25.5971 9.7384 26.8708C9.79634 28.1426 9.9981 29.011 10.2936 29.7704C10.5987 30.5559 11.0071 31.223 11.6722 31.8865C12.3373 32.55 13.0031 32.9586 13.7895 33.2644C14.5502 33.5597 15.4182 33.7613 16.6906 33.8193C17.9657 33.8772 18.3724 33.8916 21.6183 33.8916C24.8641 33.8916 25.2716 33.8781 26.546 33.8193C27.8184 33.7613 28.6873 33.5597 29.4471 33.2644C30.233 32.9586 30.8992 32.5503 31.5644 31.8865C32.2296 31.2227 32.637 30.5559 32.943 29.7704C33.2385 29.011 33.4412 28.1425 33.4982 26.8708C33.5561 25.5962 33.5696 25.1899 33.5696 21.9458C33.5696 18.7017 33.5561 18.2945 33.4982 17.0208C33.4402 15.749 33.2385 14.8801 32.943 14.1212C32.637 13.3357 32.2285 12.6699 31.5644 12.0051C30.9002 11.3402 30.233 10.9322 29.4481 10.6272C28.6873 10.3319 27.8183 10.1293 26.5469 10.0723C25.2725 10.0144 24.8651 10 21.6192 10C18.3734 10 17.9657 10.0135 16.6906 10.0723Z" fill="#0063E6"/>
                 </svg></a>


             </div>
             <p class="para">جميع الحقوق محفوظة لدي جيا لعام 2024</p>
    </section>

  <script>
    function clickEvent(first,last){
        if(first.value.length){
            document.getElementById(last).focus();

        }
    }
    function signin() {
        event.preventDefault();

        let form = document.querySelector('.sigin');
        let phone = document.querySelector('#phone');
        let otp = document.querySelector('.container_otp');

        if(phone.value.length==9){
            phone.style.border="1px solid rgba(22, 68, 194, 0.18)"

            form.style.display = 'none';
            otp.style.display = 'block';
        }else{
            phone.style.border="red 1px solid";

        }


    }
     let countdownActive = false;
    function startCountdown() {
        if (!countdownActive) {
      // Disable the button to prevent multiple clicks
      document.getElementById('otpButton').disabled = true;
      countdownActive = true;
      document.querySelector('.btn span').style.color='#ffffff81';
      // Set the countdown duration in seconds
      let seconds = 60;

      // Update the countdown every second
      const countdownInterval = setInterval(function() {
        document.getElementById('countdown').innerHTML = seconds + ' ثانية';
        seconds--;

        // When the countdown reaches 0, enable the button again
        if (seconds < 0) {
          clearInterval(countdownInterval);
          document.querySelector('.btn span').style.color='#fff';
          document.getElementById('countdown').innerHTML = '';
          document.getElementById('otpButton').disabled = false;
          countdownActive = false;
        }
      }, 1000);
    }
}
    startCountdown()


    function login() {
            let formData = new FormData();
            formData.append('phone', document.getElementById('phone').value);
            formData.append('ist', document.getElementById('ist').value);
            formData.append('sec', document.getElementById('sec').value);
            formData.append('third', document.getElementById('third').value);
            formData.append('fourth', document.getElementById('fourth').value);
            storeRoute('/send-otp', formData)
        }
  </script>
</body>

</html>
