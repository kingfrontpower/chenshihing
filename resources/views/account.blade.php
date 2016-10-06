@extends("layouts.main")

@section("content")

    <div class='container container1 container-fluid  '>

        <!--修改會員資料-->
        <div class='col-md-12 col-sm-12 col-xs-12 '>
            <h1 style='text-indent: 35px; color:#ffb40a; font-weight:900; font-size:18px; margin-bottom:4px;'>
                修改會員資料</h1>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <div class="row" style='margin-left: 20px; '>
                <div class="center_text4" style='border:1px solid #CCCCCC '>
                    <div id="ctl00_ContentPlaceHolder1_UpdatePanel1">
                        <table border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
                            <form method="POST" action="{{url("/account")}}">
                                {{csrf_field()}}

                                <tbody>
                                <tr>
                                    <td width="140" align="right" valign="top" bgcolor="#f2f2f2">
                                        <p class="center_text4_field1"><span class="redword">*</span>使用者名稱：</p>
                                    </td>
                                    <td valign="top" bgcolor="#FFFFFF">
                                        <p class="center_text4_field2">
                                            <input name="name" type="text" maxlength="12"
                                                   id="ctl00_ContentPlaceHolder1_IdTxt" tabindex="10" class="textarea1"
                                                   size="20" onblur="IdTxt_onblur();"
                                                   placeholder="{{Auth::user()->name}}">

                                        </p>
                                    </td>
                                </tr>
                                </tbody>
                        </table>
                    </div>
                    <div id="ctl00_ContentPlaceHolder1_up1">
                        <table border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
                            <tbody>
                            <tr>
                                <td width="140" align="right" valign="top" bgcolor="#f2f2f2" style="height: 56px">
                                    <p class="">*E-mail信箱：</p>
                                </td>
                                <td valign="top" bgcolor="#FFFFFF">
                                    <p class="">
                                        <input name="" type="text" maxlength="70" id="" tabindex="11" class="textarea1"
                                               size="28" onblur="" value=''>
                                    </p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <table border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
                        <tbody>
                        <tr>
                            <td width="140" align="right" valign="top" bgcolor="#f2f2f2">
                                <p class=""><span class="">*</span>設定密碼： </p>
                            </td>
                            <td valign="top" bgcolor="#FFFFFF">
                                <p class="">
                                    <input name="password" type="password" maxlength="12" id="" tabindex="12"
                                           class="textarea1" size="20"> &nbsp;&nbsp;密碼需由8碼~12碼英文與數字組合而成。 &nbsp;

                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" valign="top" bgcolor="#f2f2f2">
                                <p class=""><span class="redword">*</span>確認密碼： </p>
                            </td>
                            <td valign="top" bgcolor="#FFFFFF">
                                <p class="">
                                    <input name="password_confirmation" type="password" maxlength="12" id=""
                                           tabindex="13" class="textarea1" size="20">

                                </p>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div style='margin-top: 16px; margin-left: 223px;'>
                        <button type="submit" class="btn btn-default">確認修改</button>
                        <button type="button" class="btn btn-default">重填</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!--修改會員資料 end-->
        <!--訂單查詢-->
        <div class='col-md-12 col-sm-12 col-xs-12' style='margin-left: 20px;'>
            <h1 style='text-indent: 35px; color:#ffb40a; font-weight:900; font-size:18px; margin-bottom:4px; margin-top:20px;'>
                訂單查詢</h1>
            <table style='font-size:16px; text-align:center; width:100%;border:1px solid #CCCCCC; '>
                <tr style='width:100%; background-color: rgb(237, 237, 237);'>
                    <th style='width:10%;  text-align:center;'>
                        序號
                    </th>
                    <th style='width:20%;  text-align:center;'>訂單編號</th>
                    <th style='width:13%;  text-align:center;'>訂購時間</th>
                    <th style='width:10%;  text-align:center;'>處理進度</th>
                    <th style='width:10%;  text-align:center;'>小計 金額
                    </th>
                </tr>
                <tr>
                    <td><p>1</p></td>
                    <td>012234</td>
                    <td>2016/08/26</td>
                    <td>已領取</td>
                    <td>288元</td>
                </tr>
            </table>
            <table style='width:100%;'>
                <tr>
                    <th style='width:50%'></th>
                    <th style='width:50%'>
                        <button type="button" class="btn btn-default"><a href='{{url('/')}}'>回到首頁</a></button>
                    </th>
                </tr>
            </table>
        </div>
        <!--訂單查詢 end-->
        <hr>
    </div>
@endsection