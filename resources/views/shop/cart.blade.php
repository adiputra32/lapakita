@extends('layouts.master-shop')

@section ('title', 'Toko Sneakers - Home')
    
@section('content')
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Shopping Cart</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="categor">Cart</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <form action="checkout" method="post" enctype="multipart/form-data">
                            @csrf  
                            <tbody>
                                <?php $tmp_tot_price = 0; $i = 1; $count= 0;?>
                                @foreach($cart as $crt)
                                    @foreach($product as $prd)
                                        <?php if($prd->id == $crt->product_id){ ?>
                                <tr>
                                    <td>
                                        <div class="media">
                                            <div class="d-flex">
                                                <img src="{{  asset('/storage/product_image/'.$prd->product_image->first()->image_name) }}" alt="" width="100" height="100">
                                            </div>
                                            <div class="media-body">
                                                <p>{{ $prd->product_name }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <?php $tmp_price = $prd->price; ?>
                                        <h5>{{ $tmp_price }}</h5>
                                        <input type="hidden" id="qty{{$i + 1}}" value="{{ $tmp_price }}">
                                    </td>
                                    <td>
                                        <div class="product_count">
                                            <input type="number" name="qty{{$i}}" id="qty{{$i}}" maxlength="12" value="{{ $crt->qty }}" onkeyup="var qty1 = document.getElementById('qty{{$i}}').value; var qty2 = document.getElementById('qty{{$i + 1}}').value; var qty = qty1 * qty2; document.getElementById('qty{{$i + 2}}').innerHTML = qty;" title="Quantity:" class="input-text qty">
                                        </div>
                                    </td>
                                    <td>
                                        <h5 id="qty{{$i + 2}}" >{{ $tmp_price = $tmp_price * $crt->qty }}</h5>
                                        <input type="hidden" name="id_cart{{$count}}" value="{{ $crt->id }}">
                                        <?php $tmp_tot_price = $tmp_tot_price + $tmp_price; $i = $i + 3; $count = $count + 1;?>
                                    </td>
                                </tr>
                                        <?php } ?>
                                    @endforeach
                                @endforeach
                                <input type="hidden" name="counter" value="{{ $count }}">
                                <tr class="shipping_area">
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                        
                                        <div class="shipping_box" >
                                            <select class="shipping_select" id="province" name="province" onchange="getCity()" required> 
                                                <option value="" disabled selected> -- Pilih Provinsi --</option>
                                                <?php $i = 0; ?>
                                                @while($i <= 33)
                                                    <option value="{{ $i }}">{{ $array_result['rajaongkir']['results'][$i]['province'] }}</option>
                                                    <?php $i = $i + 1; ?>
                                                @endwhile
                                            </select>
                                            <div id="default">
                                                <select class="shipping_select"> 
                                                    <option value="" disabled selected> -- Pilih Kota --</option>
                                                </select>
                                            </div>
                                            <div id="k1">
                                                <select class="shipping_select" id="kota1" name="city">
                                                    <option value="" disabled selected> -- Pilih Kota --</option>
                                                    <option value="16">{{ $array_result2['rajaongkir']['results'][16]['city_name'] }}</option>
                                                    <option value="31">{{ $array_result2['rajaongkir']['results'][31]['city_name'] }}</option>
                                                    <option value="93">{{ $array_result2['rajaongkir']['results'][93]['city_name'] }}</option>
                                                    <option value="113">{{ $array_result2['rajaongkir']['results'][113]['city_name'] }}</option>
                                                    <option value="127">{{ $array_result2['rajaongkir']['results'][127]['city_name'] }}</option>
                                                    <option value="160">{{ $array_result2['rajaongkir']['results'][160]['city_name'] }}</option>
                                                    <option value="169">{{ $array_result2['rajaongkir']['results'][169]['city_name'] }}</option>
                                                    <option value="196">{{ $array_result2['rajaongkir']['results'][196]['city_name'] }}</option>
                                                    <option value="446">{{ $array_result2['rajaongkir']['results'][446]['city_name'] }}</option>
                                                </select>
                                            </div>
                                            <div id="k2">
                                                <select class="shipping_select" id="kota2" name="city">
                                                    <option value="" disabled selected> -- Pilih Kota --</option>
                                                    <option value="26">{{ $array_result2['rajaongkir']['results'][26]['city_name'] }}</option>
                                                    <option value="27">{{ $array_result2['rajaongkir']['results'][27]['city_name'] }}</option>
                                                    <option value="28">{{ $array_result2['rajaongkir']['results'][28]['city_name'] }}</option>
                                                    <option value="29">{{ $array_result2['rajaongkir']['results'][29]['city_name'] }}</option>
                                                    <option value="55">{{ $array_result2['rajaongkir']['results'][55]['city_name'] }}</option>
                                                    <option value="56">{{ $array_result2['rajaongkir']['results'][56]['city_name'] }}</option>
                                                    <option value="333">{{ $array_result2['rajaongkir']['results'][333]['city_name'] }}</option>
                                                </select>
                                            </div>
                                            <div id="k3">
                                                <select class="shipping_select" id="kota3" name="city">
                                                    <option value="" disabled selected> -- Pilih Kota --</option>
                                                    <option value="105">{{ $array_result2['rajaongkir']['results'][105]['city_name'] }}</option>
                                                    <option value="231">{{ $array_result2['rajaongkir']['results'][231]['city_name'] }}</option>
                                                    <option value="330">{{ $array_result2['rajaongkir']['results'][330]['city_name'] }}</option>
                                                    <option value="401">{{ $array_result2['rajaongkir']['results'][401]['city_name'] }}</option>
                                                    <option value="402">{{ $array_result2['rajaongkir']['results'][402]['city_name'] }}</option>
                                                    <option value="454">{{ $array_result2['rajaongkir']['results'][454]['city_name'] }}</option>
                                                    <option value="455">{{ $array_result2['rajaongkir']['results'][455]['city_name'] }}</option>
                                                    <option value="456">{{ $array_result2['rajaongkir']['results'][456]['city_name'] }}</option>
                                                </select>
                                            </div>
                                            <div id="k4">
                                                <select class="shipping_select" id="kota4" name="city">
                                                    <option value="" disabled selected> -- Pilih Kota --</option>
                                                    <option value="61">{{ $array_result2['rajaongkir']['results'][61]['city_name'] }}</option>
                                                    <option value="62">{{ $array_result2['rajaongkir']['results'][62]['city_name'] }}</option>
                                                    <option value="63">{{ $array_result2['rajaongkir']['results'][63]['city_name'] }}</option>
                                                    <option value="64">{{ $array_result2['rajaongkir']['results'][64]['city_name'] }}</option>
                                                    <option value="174">{{ $array_result2['rajaongkir']['results'][174]['city_name'] }}</option>
                                                    <option value="182">{{ $array_result2['rajaongkir']['results'][182]['city_name'] }}</option>
                                                    <option value="232">{{ $array_result2['rajaongkir']['results'][232]['city_name'] }}</option>
                                                    <option value="293">{{ $array_result2['rajaongkir']['results'][293]['city_name'] }}</option>
                                                    <option value="378">{{ $array_result2['rajaongkir']['results'][378]['city_name'] }}</option>
                                                    <option value="396">{{ $array_result2['rajaongkir']['results'][396]['city_name'] }}</option>
                                                </select>
                                            </div>
                                            <div id="k5">
                                                <select class="shipping_select" id="kota5" name="city">
                                                    <option value="" disabled selected> -- Pilih Kota --</option>
                                                    <option value="38">{{ $array_result2['rajaongkir']['results'][38]['city_name'] }}</option>
                                                    <option value="134">{{ $array_result2['rajaongkir']['results'][134]['city_name'] }}</option>
                                                    <option value="209">{{ $array_result2['rajaongkir']['results'][209]['city_name'] }}</option>
                                                    <option value="418">{{ $array_result2['rajaongkir']['results'][418]['city_name'] }}</option>
                                                    <option value="500">{{ $array_result2['rajaongkir']['results'][500]['city_name'] }}</option>
                                                </select>
                                            </div>
                                            <div id="k6">
                                                <select class="shipping_select" id="kota6" name="city">
                                                    <option value="" disabled selected> -- Pilih Kota --</option>
                                                    <option value="150">{{ $array_result2['rajaongkir']['results'][150]['city_name'] }}</option>
                                                    <option value="151">{{ $array_result2['rajaongkir']['results'][151]['city_name'] }}</option>
                                                    <option value="152">{{ $array_result2['rajaongkir']['results'][152]['city_name'] }}</option>
                                                    <option value="153">{{ $array_result2['rajaongkir']['results'][153]['city_name'] }}</option>
                                                    <option value="154">{{ $array_result2['rajaongkir']['results'][154]['city_name'] }}</option>
                                                    <option value="188">{{ $array_result2['rajaongkir']['results'][188]['city_name'] }}</option>
                                                </select>
                                            </div>
                                            <div id="k7">
                                                <select class="shipping_select" id="kota7" name="city">
                                                    <option value="" disabled selected> -- Pilih Kota --</option>
                                                    <option value="76">{{ $array_result2['rajaongkir']['results'][76]['city_name'] }}</option>
                                                    <option value="87">{{ $array_result2['rajaongkir']['results'][87]['city_name'] }}</option>
                                                    <option value="128">{{ $array_result2['rajaongkir']['results'][128]['city_name'] }}</option>
                                                    <option value="129">{{ $array_result2['rajaongkir']['results'][129]['city_name'] }}</option>
                                                    <option value="130">{{ $array_result2['rajaongkir']['results'][130]['city_name'] }}</option>
                                                    <option value="360">{{ $array_result2['rajaongkir']['results'][360]['city_name'] }}</option>
                                                </select>
                                            </div>
                                            <div id="k8">
                                                <select class="shipping_select" id="kota8" name="city">
                                                    <option value="" disabled selected> -- Pilih Kota --</option>
                                                    <option value="49">{{ $array_result2['rajaongkir']['results'][49]['city_name'] }}</option>
                                                    <option value="96">{{ $array_result2['rajaongkir']['results'][96]['city_name'] }}</option>
                                                    <option value="155">{{ $array_result2['rajaongkir']['results'][155]['city_name'] }}</option>
                                                    <option value="193">{{ $array_result2['rajaongkir']['results'][193]['city_name'] }}</option>
                                                    <option value="279">{{ $array_result2['rajaongkir']['results'][279]['city_name'] }}</option>
                                                    <option value="292">{{ $array_result2['rajaongkir']['results'][292]['city_name'] }}</option>
                                                    <option value="392">{{ $array_result2['rajaongkir']['results'][392]['city_name'] }}</option>
                                                    <option value="441">{{ $array_result2['rajaongkir']['results'][441]['city_name'] }}</option>
                                                    <option value="459">{{ $array_result2['rajaongkir']['results'][459]['city_name'] }}</option>
                                                    <option value="460">{{ $array_result2['rajaongkir']['results'][460]['city_name'] }}</option>
                                                    <option value="470">{{ $array_result2['rajaongkir']['results'][470]['city_name'] }}</option>
                                                </select>
                                            </div>
                                            <div id="k9">
                                                <select class="shipping_select" id="kota9" name="city">
                                                    <option value="" disabled selected> -- Pilih Kota --</option>
                                                    <option value="21">{{ $array_result2['rajaongkir']['results'][21]['city_name'] }}</option>
                                                    <option value="22">{{ $array_result2['rajaongkir']['results'][22]['city_name'] }}</option>
                                                    <option value="23">{{ $array_result2['rajaongkir']['results'][23]['city_name'] }}</option>
                                                    <option value="33">{{ $array_result2['rajaongkir']['results'][33]['city_name'] }}</option>
                                                    <option value="53">{{ $array_result2['rajaongkir']['results'][53]['city_name'] }}</option>
                                                    <option value="54">{{ $array_result2['rajaongkir']['results'][54]['city_name'] }}</option>
                                                    <option value="77">{{ $array_result2['rajaongkir']['results'][77]['city_name'] }}</option>
                                                    <option value="78">{{ $array_result2['rajaongkir']['results'][78]['city_name'] }}</option>
                                                    <option value="102">{{ $array_result2['rajaongkir']['results'][102]['city_name'] }}</option>
                                                    <option value="103">{{ $array_result2['rajaongkir']['results'][103]['city_name'] }}</option>
                                                    <option value="106">{{ $array_result2['rajaongkir']['results'][106]['city_name'] }}</option>
                                                    <option value="107">{{ $array_result2['rajaongkir']['results'][107]['city_name'] }}</option>
                                                    <option value="108">{{ $array_result2['rajaongkir']['results'][108]['city_name'] }}</option>
                                                    <option value="114">{{ $array_result2['rajaongkir']['results'][114]['city_name'] }}</option>
                                                    <option value="125">{{ $array_result2['rajaongkir']['results'][125]['city_name'] }}</option>
                                                    <option value="148">{{ $array_result2['rajaongkir']['results'][148]['city_name'] }}</option>
                                                    <option value="170">{{ $array_result2['rajaongkir']['results'][170]['city_name'] }}</option>
                                                    <option value="210">{{ $array_result2['rajaongkir']['results'][210]['city_name'] }}</option>
                                                    <option value="251">{{ $array_result2['rajaongkir']['results'][251]['city_name'] }}</option>
                                                    <option value="331">{{ $array_result2['rajaongkir']['results'][331]['city_name'] }}</option>
                                                    <option value="375">{{ $array_result2['rajaongkir']['results'][375]['city_name'] }}</option>
                                                    <option value="427">{{ $array_result2['rajaongkir']['results'][427]['city_name'] }}</option>
                                                    <option value="429">{{ $array_result2['rajaongkir']['results'][429]['city_name'] }}</option>
                                                    <option value="430">{{ $array_result2['rajaongkir']['results'][430]['city_name'] }}</option>
                                                    <option value="439">{{ $array_result2['rajaongkir']['results'][439]['city_name'] }}</option>
                                                    <option value="467">{{ $array_result2['rajaongkir']['results'][467]['city_name'] }}</option>
                                                    <option value="468">{{ $array_result2['rajaongkir']['results'][468]['city_name'] }}</option>
                                                </select>
                                            </div>
                                            <div id="k10">
                                                <select class="shipping_select" id="kota10" name="city">
                                                    <option value="" disabled selected> -- Pilih Kota --</option>
                                                    <option value="36">{{ $array_result2['rajaongkir']['results'][36]['city_name'] }}</option>
                                                    <option value="40">{{ $array_result2['rajaongkir']['results'][40]['city_name'] }}</option>
                                                    <option value="48">{{ $array_result2['rajaongkir']['results'][48]['city_name'] }}</option>
                                                    <option value="75">{{ $array_result2['rajaongkir']['results'][75]['city_name'] }}</option>
                                                    <option value="90">{{ $array_result2['rajaongkir']['results'][90]['city_name'] }}</option>
                                                    <option value="91">{{ $array_result2['rajaongkir']['results'][91]['city_name'] }}</option>
                                                    <option value="104">{{ $array_result2['rajaongkir']['results'][104]['city_name'] }}</option>
                                                    <option value="112">{{ $array_result2['rajaongkir']['results'][112]['city_name'] }}</option>
                                                    <option value="133">{{ $array_result2['rajaongkir']['results'][133]['city_name'] }}</option>
                                                    <option value="162">{{ $array_result2['rajaongkir']['results'][162]['city_name'] }}</option>
                                                    <option value="168">{{ $array_result2['rajaongkir']['results'][168]['city_name'] }}</option>
                                                    <option value="176">{{ $array_result2['rajaongkir']['results'][176]['city_name'] }}</option>
                                                    <option value="180">{{ $array_result2['rajaongkir']['results'][180]['city_name'] }}</option>
                                                    <option value="195">{{ $array_result2['rajaongkir']['results'][195]['city_name'] }}</option>
                                                    <option value="208">{{ $array_result2['rajaongkir']['results'][208]['city_name'] }}</option>
                                                    <option value="248">{{ $array_result2['rajaongkir']['results'][248]['city_name'] }}</option>
                                                    <option value="249">{{ $array_result2['rajaongkir']['results'][249]['city_name'] }}</option>
                                                    <option value="343">{{ $array_result2['rajaongkir']['results'][343]['city_name'] }}</option>
                                                    <option value="347">{{ $array_result2['rajaongkir']['results'][347]['city_name'] }}</option>
                                                    <option value="348">{{ $array_result2['rajaongkir']['results'][348]['city_name'] }}</option>
                                                    <option value="351">{{ $array_result2['rajaongkir']['results'][351]['city_name'] }}</option>
                                                    <option value="374">{{ $array_result2['rajaongkir']['results'][374]['city_name'] }}</option>
                                                    <option value="376">{{ $array_result2['rajaongkir']['results'][376]['city_name'] }}</option>
                                                    <option value="379">{{ $array_result2['rajaongkir']['results'][379]['city_name'] }}</option>
                                                    <option value="385">{{ $array_result2['rajaongkir']['results'][385]['city_name'] }}</option>
                                                    <option value="397">{{ $array_result2['rajaongkir']['results'][397]['city_name'] }}</option>
                                                    <option value="398">{{ $array_result2['rajaongkir']['results'][398]['city_name'] }}</option>
                                                    <option value="426">{{ $array_result2['rajaongkir']['results'][426]['city_name'] }}</option>
                                                    <option value="432">{{ $array_result2['rajaongkir']['results'][432]['city_name'] }}</option>
                                                    <option value="444">{{ $array_result2['rajaongkir']['results'][444]['city_name'] }}</option>
                                                    <option value="471">{{ $array_result2['rajaongkir']['results'][471]['city_name'] }}</option>
                                                    <option value="472">{{ $array_result2['rajaongkir']['results'][472]['city_name'] }}</option>
                                                    <option value="475">{{ $array_result2['rajaongkir']['results'][475]['city_name'] }}</option>
                                                    <option value="496">{{ $array_result2['rajaongkir']['results'][496]['city_name'] }}</option>
                                                    <option value="497">{{ $array_result2['rajaongkir']['results'][497]['city_name'] }}</option>
                                                </select>
                                            </div>
                                            <div id="k11">
                                                <select class="shipping_select" id="kota11" name="city">
                                                    <option value="" disabled selected> -- Pilih Kota --</option>
                                                    <option value="30">{{ $array_result2['rajaongkir']['results'][30]['city_name'] }}</option>
                                                    <option value="41">{{ $array_result2['rajaongkir']['results'][41]['city_name'] }}</option>
                                                    <option value="50">{{ $array_result2['rajaongkir']['results'][50]['city_name'] }}</option>
                                                    <option value="73">{{ $array_result2['rajaongkir']['results'][73]['city_name'] }}</option>
                                                    <option value="74">{{ $array_result2['rajaongkir']['results'][74]['city_name'] }}</option>
                                                    <option value="79">{{ $array_result2['rajaongkir']['results'][79]['city_name'] }}</option>
                                                    <option value="85">{{ $array_result2['rajaongkir']['results'][85]['city_name'] }}</option>
                                                    <option value="132">{{ $array_result2['rajaongkir']['results'][132]['city_name'] }}</option>
                                                    <option value="159">{{ $array_result2['rajaongkir']['results'][159]['city_name'] }}</option>
                                                    <option value="163">{{ $array_result2['rajaongkir']['results'][163]['city_name'] }}</option>
                                                    <option value="177">{{ $array_result2['rajaongkir']['results'][177]['city_name'] }}</option>
                                                    <option value="178">{{ $array_result2['rajaongkir']['results'][178]['city_name'] }}</option>
                                                    <option value="221">{{ $array_result2['rajaongkir']['results'][221]['city_name'] }}</option>
                                                    <option value="242">{{ $array_result2['rajaongkir']['results'][242]['city_name'] }}</option>
                                                    <option value="246">{{ $array_result2['rajaongkir']['results'][246]['city_name'] }}</option>
                                                    <option value="247">{{ $array_result2['rajaongkir']['results'][247]['city_name'] }}</option>
                                                    <option value="250">{{ $array_result2['rajaongkir']['results'][250]['city_name'] }}</option>
                                                    <option value="254">{{ $array_result2['rajaongkir']['results'][254]['city_name'] }}</option>
                                                    <option value="255">{{ $array_result2['rajaongkir']['results'][255]['city_name'] }}</option>
                                                    <option value="288">{{ $array_result2['rajaongkir']['results'][288]['city_name'] }}</option>
                                                    <option value="289">{{ $array_result2['rajaongkir']['results'][289]['city_name'] }}</option>
                                                    <option value="304">{{ $array_result2['rajaongkir']['results'][304]['city_name'] }}</option>
                                                    <option value="305">{{ $array_result2['rajaongkir']['results'][305]['city_name'] }}</option>
                                                    <option value="316">{{ $array_result2['rajaongkir']['results'][316]['city_name'] }}</option>
                                                    <option value="329">{{ $array_result2['rajaongkir']['results'][329]['city_name'] }}</option>
                                                    <option value="341">{{ $array_result2['rajaongkir']['results'][341]['city_name'] }}</option>
                                                    <option value="342">{{ $array_result2['rajaongkir']['results'][342]['city_name'] }}</option>
                                                    <option value="362">{{ $array_result2['rajaongkir']['results'][362]['city_name'] }}</option>
                                                    <option value="368">{{ $array_result2['rajaongkir']['results'][368]['city_name'] }}</option>
                                                    <option value="369">{{ $array_result2['rajaongkir']['results'][369]['city_name'] }}</option>
                                                    <option value="389">{{ $array_result2['rajaongkir']['results'][389]['city_name'] }}</option>
                                                    <option value="408">{{ $array_result2['rajaongkir']['results'][408]['city_name'] }}</option>
                                                    <option value="417">{{ $array_result2['rajaongkir']['results'][417]['city_name'] }}</option>
                                                    <option value="440">{{ $array_result2['rajaongkir']['results'][440]['city_name'] }}</option>
                                                    <option value="443">{{ $array_result2['rajaongkir']['results'][443]['city_name'] }}</option>
                                                    <option value="486">{{ $array_result2['rajaongkir']['results'][486]['city_name'] }}</option>
                                                    <option value="488">{{ $array_result2['rajaongkir']['results'][488]['city_name'] }}</option>
                                                    <option value="491">{{ $array_result2['rajaongkir']['results'][491]['city_name'] }}</option>
                                                </select>
                                            </div>
                                            <div id="k12">
                                                <select class="shipping_select" id="kota12" name="city">
                                                    <option value="" disabled selected> -- Pilih Kota --</option>
                                                    <option value="60">{{ $array_result2['rajaongkir']['results'][60]['city_name'] }}</option>
                                                    <option value="167">{{ $array_result2['rajaongkir']['results'][167]['city_name'] }}</option>
                                                    <option value="175">{{ $array_result2['rajaongkir']['results'][175]['city_name'] }}</option>
                                                    <option value="194">{{ $array_result2['rajaongkir']['results'][194]['city_name'] }}</option>
                                                    <option value="207">{{ $array_result2['rajaongkir']['results'][207]['city_name'] }}</option>
                                                    <option value="227">{{ $array_result2['rajaongkir']['results'][227]['city_name'] }}</option>
                                                    <option value="278">{{ $array_result2['rajaongkir']['results'][278]['city_name'] }}</option>
                                                    <option value="363">{{ $array_result2['rajaongkir']['results'][363]['city_name'] }}</option>
                                                    <option value="364">{{ $array_result2['rajaongkir']['results'][364]['city_name'] }}</option>
                                                    <option value="387">{{ $array_result2['rajaongkir']['results'][387]['city_name'] }}</option>
                                                    <option value="390">{{ $array_result2['rajaongkir']['results'][390]['city_name'] }}</option>
                                                    <option value="394">{{ $array_result2['rajaongkir']['results'][394]['city_name'] }}</option>
                                                    <option value="414">{{ $array_result2['rajaongkir']['results'][414]['city_name'] }}</option>
                                                    <option value="416">{{ $array_result2['rajaongkir']['results'][416]['city_name'] }}</option>
                                                </select>
                                            </div>
                                            <div id="k13">
                                                <select class="shipping_select" id="kota13" name="city">
                                                    <option value="" disabled selected> -- Pilih Kota --</option>
                                                    <option value="17">{{ $array_result2['rajaongkir']['results'][17]['city_name'] }}</option>
                                                    <option value="32">{{ $array_result2['rajaongkir']['results'][32]['city_name'] }}</option>
                                                    <option value="34">{{ $array_result2['rajaongkir']['results'][34]['city_name'] }}</option>
                                                    <option value="35">{{ $array_result2['rajaongkir']['results'][35]['city_name'] }}</option>
                                                    <option value="42">{{ $array_result2['rajaongkir']['results'][42]['city_name'] }}</option>
                                                    <option value="142">{{ $array_result2['rajaongkir']['results'][142]['city_name'] }}</option>
                                                    <option value="143">{{ $array_result2['rajaongkir']['results'][143]['city_name'] }}</option>
                                                    <option value="144">{{ $array_result2['rajaongkir']['results'][144]['city_name'] }}</option>
                                                    <option value="202">{{ $array_result2['rajaongkir']['results'][202]['city_name'] }}</option>
                                                    <option value="445">{{ $array_result2['rajaongkir']['results'][445]['city_name'] }}</option>
                                                    <option value="451">{{ $array_result2['rajaongkir']['results'][451]['city_name'] }}</option>
                                                    <option value="453">{{ $array_result2['rajaongkir']['results'][453]['city_name'] }}</option>
                                                    <option value="465">{{ $array_result2['rajaongkir']['results'][465]['city_name'] }}</option>
                                                </select>
                                            </div>
                                            <div id="k14">
                                                <select class="shipping_select" id="kota14" name="city">
                                                    <option value="" disabled selected> -- Pilih Kota --</option>
                                                    <option value="43">{{ $array_result2['rajaongkir']['results'][43]['city_name'] }}</option>
                                                    <option value="44">{{ $array_result2['rajaongkir']['results'][44]['city_name'] }}</option>
                                                    <option value="45">{{ $array_result2['rajaongkir']['results'][45]['city_name'] }}</option>
                                                    <option value="135">{{ $array_result2['rajaongkir']['results'][135]['city_name'] }}</option>
                                                    <option value="166">{{ $array_result2['rajaongkir']['results'][166]['city_name'] }}</option>
                                                    <option value="173">{{ $array_result2['rajaongkir']['results'][173]['city_name'] }}</option>
                                                    <option value="204">{{ $array_result2['rajaongkir']['results'][204]['city_name'] }}</option>
                                                    <option value="205">{{ $array_result2['rajaongkir']['results'][205]['city_name'] }}</option>
                                                    <option value="220">{{ $array_result2['rajaongkir']['results'][220]['city_name'] }}</option>
                                                    <option value="295">{{ $array_result2['rajaongkir']['results'][295]['city_name'] }}</option>
                                                    <option value="325">{{ $array_result2['rajaongkir']['results'][325]['city_name'] }}</option>
                                                    <option value="370">{{ $array_result2['rajaongkir']['results'][370]['city_name'] }}</option>
                                                    <option value="404">{{ $array_result2['rajaongkir']['results'][404]['city_name'] }}</option>
                                                    <option value="431">{{ $array_result2['rajaongkir']['results'][431]['city_name'] }}</option>
                                                </select>
                                            </div>
                                            <div id="k15">
                                                <select class="shipping_select" id="kota15" name="city">
                                                    <option value="" disabled selected> -- Pilih Kota --</option>
                                                    <option value="18">{{ $array_result2['rajaongkir']['results'][18]['city_name'] }}</option>
                                                    <option value="65">{{ $array_result2['rajaongkir']['results'][65]['city_name'] }}</option>
                                                    <option value="88">{{ $array_result2['rajaongkir']['results'][88]['city_name'] }}</option>
                                                    <option value="213">{{ $array_result2['rajaongkir']['results'][213]['city_name'] }}</option>
                                                    <option value="214">{{ $array_result2['rajaongkir']['results'][214]['city_name'] }}</option>
                                                    <option value="215">{{ $array_result2['rajaongkir']['results'][215]['city_name'] }}</option>
                                                    <option value="340">{{ $array_result2['rajaongkir']['results'][340]['city_name'] }}</option>
                                                    <option value="353">{{ $array_result2['rajaongkir']['results'][353]['city_name'] }}</option>
                                                    <option value="386">{{ $array_result2['rajaongkir']['results'][386]['city_name'] }}</option>
                                                </select>
                                            </div>
                                            <div id="k16">
                                                <select class="shipping_select" id="kota16" name="city">
                                                    <option value="" disabled selected> -- Pilih Kota --</option>
                                                    <option value="95">{{ $array_result2['rajaongkir']['results'][95]['city_name'] }}</option>
                                                    <option value="256">{{ $array_result2['rajaongkir']['results'][256]['city_name'] }}</option>
                                                    <option value="310">{{ $array_result2['rajaongkir']['results'][310]['city_name'] }}</option>
                                                    <option value="449">{{ $array_result2['rajaongkir']['results'][449]['city_name'] }}</option>
                                                    <option value="466">{{ $array_result2['rajaongkir']['results'][466]['city_name'] }}</option>
                                                </select>
                                            </div>
                                            <div id="k17">
                                                <select class="shipping_select" id="kota17" name="city">
                                                    <option value="" disabled selected> -- Pilih Kota --</option>
                                                    <option value="47">{{ $array_result2['rajaongkir']['results'][47]['city_name'] }}</option>
                                                    <option value="70">{{ $array_result2['rajaongkir']['results'][70]['city_name'] }}</option>
                                                    <option value="171">{{ $array_result2['rajaongkir']['results'][171]['city_name'] }}</option>
                                                    <option value="183">{{ $array_result2['rajaongkir']['results'][183]['city_name'] }}</option>
                                                    <option value="236">{{ $array_result2['rajaongkir']['results'][236]['city_name'] }}</option>
                                                    <option value="301">{{ $array_result2['rajaongkir']['results'][301]['city_name'] }}</option>
                                                    <option value="461">{{ $array_result2['rajaongkir']['results'][461]['city_name'] }}</option>
                                                </select>
                                            </div>
                                            <div id="k18">
                                                <select class="shipping_select" id="kota18" name="city">
                                                    <option value="" disabled selected> -- Pilih Kota --</option>
                                                    <option value="20">{{ $array_result2['rajaongkir']['results'][20]['city_name'] }}</option>
                                                    <option value="222">{{ $array_result2['rajaongkir']['results'][222]['city_name'] }}</option>
                                                    <option value="223">{{ $array_result2['rajaongkir']['results'][223]['city_name'] }}</option>
                                                    <option value="224">{{ $array_result2['rajaongkir']['results'][224]['city_name'] }}</option>
                                                    <option value="225">{{ $array_result2['rajaongkir']['results'][225]['city_name'] }}</option>
                                                    <option value="226">{{ $array_result2['rajaongkir']['results'][226]['city_name'] }}</option>
                                                    <option value="281">{{ $array_result2['rajaongkir']['results'][281]['city_name'] }}</option>
                                                    <option value="282">{{ $array_result2['rajaongkir']['results'][282]['city_name'] }}</option>
                                                    <option value="354">{{ $array_result2['rajaongkir']['results'][354]['city_name'] }}</option>
                                                    <option value="355">{{ $array_result2['rajaongkir']['results'][355]['city_name'] }}</option>
                                                    <option value="367">{{ $array_result2['rajaongkir']['results'][367]['city_name'] }}</option>
                                                    <option value="457">{{ $array_result2['rajaongkir']['results'][457]['city_name'] }}</option>
                                                    <option value="489">{{ $array_result2['rajaongkir']['results'][489]['city_name'] }}</option>
                                                    <option value="490">{{ $array_result2['rajaongkir']['results'][490]['city_name'] }}</option>
                                                    <option value="495">{{ $array_result2['rajaongkir']['results'][495]['city_name'] }}</option>
                                                </select>
                                            </div>
                                            <div id="k19">
                                                <select class="shipping_select" id="kota19" name="city">
                                                    <option value="" disabled selected> -- Pilih Kota --</option>
                                                    <option value="13">{{ $array_result2['rajaongkir']['results'][13]['city_name'] }}</option>
                                                    <option value="98">{{ $array_result2['rajaongkir']['results'][98]['city_name'] }}</option>
                                                    <option value="99">{{ $array_result2['rajaongkir']['results'][99]['city_name'] }}</option>
                                                    <option value="184">{{ $array_result2['rajaongkir']['results'][184]['city_name'] }}</option>
                                                    <option value="257">{{ $array_result2['rajaongkir']['results'][257]['city_name'] }}</option>
                                                    <option value="258">{{ $array_result2['rajaongkir']['results'][258]['city_name'] }}</option>
                                                    <option value="259">{{ $array_result2['rajaongkir']['results'][259]['city_name'] }}</option>
                                                    <option value="260">{{ $array_result2['rajaongkir']['results'][260]['city_name'] }}</option>
                                                    <option value="399">{{ $array_result2['rajaongkir']['results'][399]['city_name'] }}</option>
                                                    <option value="400">{{ $array_result2['rajaongkir']['results'][400]['city_name'] }}</option>
                                                    <option value="487">{{ $array_result2['rajaongkir']['results'][487]['city_name'] }}</option>
                                                </select>
                                            </div>
                                            <div id="k20">
                                                <select class="shipping_select" id="kota20" name="city">
                                                    <option value="" disabled selected> -- Pilih Kota --</option>
                                                    <option value="137">{{ $array_result2['rajaongkir']['results'][137]['city_name'] }}</option>
                                                    <option value="138">{{ $array_result2['rajaongkir']['results'][138]['city_name'] }}</option>
                                                    <option value="139">{{ $array_result2['rajaongkir']['results'][139]['city_name'] }}</option>
                                                    <option value="140">{{ $array_result2['rajaongkir']['results'][140]['city_name'] }}</option>
                                                    <option value="141">{{ $array_result2['rajaongkir']['results'][141]['city_name'] }}</option>
                                                    <option value="190">{{ $array_result2['rajaongkir']['results'][190]['city_name'] }}</option>
                                                    <option value="371">{{ $array_result2['rajaongkir']['results'][371]['city_name'] }}</option>
                                                    <option value="476">{{ $array_result2['rajaongkir']['results'][476]['city_name'] }}</option>
                                                    <option value="477">{{ $array_result2['rajaongkir']['results'][477]['city_name'] }}</option>
                                                </select>
                                            </div>
                                            <div id="k21">
                                                <select class="shipping_select" id="kota21" name="city">
                                                    <option value="" disabled selected> -- Pilih Kota --</option>
                                                    <option value="0">{{ $array_result2['rajaongkir']['results'][0]['city_name'] }}</option>
                                                    <option value="1">{{ $array_result2['rajaongkir']['results'][1]['city_name'] }}</option>
                                                    <option value="2">{{ $array_result2['rajaongkir']['results'][2]['city_name'] }}</option>
                                                    <option value="3">{{ $array_result2['rajaongkir']['results'][3]['city_name'] }}</option>
                                                    <option value="4">{{ $array_result2['rajaongkir']['results'][4]['city_name'] }}</option>
                                                    <option value="5">{{ $array_result2['rajaongkir']['results'][5]['city_name'] }}</option>
                                                    <option value="6">{{ $array_result2['rajaongkir']['results'][6]['city_name'] }}</option>
                                                    <option value="7">{{ $array_result2['rajaongkir']['results'][7]['city_name'] }}</option>
                                                    <option value="8">{{ $array_result2['rajaongkir']['results'][8]['city_name'] }}</option>
                                                    <option value="9">{{ $array_result2['rajaongkir']['results'][9]['city_name'] }}</option>
                                                    <option value="10">{{ $array_result2['rajaongkir']['results'][10]['city_name'] }}</option>
                                                    <option value="19">{{ $array_result2['rajaongkir']['results'][19]['city_name'] }}</option>
                                                    <option value="58">{{ $array_result2['rajaongkir']['results'][58]['city_name'] }}</option>
                                                    <option value="71">{{ $array_result2['rajaongkir']['results'][71]['city_name'] }}</option>
                                                    <option value="126">{{ $array_result2['rajaongkir']['results'][126]['city_name'] }}</option>
                                                    <option value="229">{{ $array_result2['rajaongkir']['results'][229]['city_name'] }}</option>
                                                    <option value="234">{{ $array_result2['rajaongkir']['results'][234]['city_name'] }}</option>
                                                    <option value="299">{{ $array_result2['rajaongkir']['results'][299]['city_name'] }}</option>
                                                    <option value="357">{{ $array_result2['rajaongkir']['results'][357]['city_name'] }}</option>
                                                    <option value="358">{{ $array_result2['rajaongkir']['results'][358]['city_name'] }}</option>
                                                    <option value="383">{{ $array_result2['rajaongkir']['results'][383]['city_name'] }}</option>
                                                    <option value="413">{{ $array_result2['rajaongkir']['results'][413]['city_name'] }}</option>
                                                    <option value="428">{{ $array_result2['rajaongkir']['results'][428]['city_name'] }}</option>
                                                </select>
                                            </div>
                                            <div id="k22">
                                                    <select class="shipping_select" id="kota22" name="city">
                                                    <option value="" disabled selected> -- Pilih Kota --</option>
                                                    <option value="67">{{ $array_result2['rajaongkir']['results'][67]['city_name'] }}</option>
                                                    <option value="68">{{ $array_result2['rajaongkir']['results'][68]['city_name'] }}</option>
                                                    <option value="117">{{ $array_result2['rajaongkir']['results'][117]['city_name'] }}</option>
                                                    <option value="237">{{ $array_result2['rajaongkir']['results'][237]['city_name'] }}</option>
                                                    <option value="238">{{ $array_result2['rajaongkir']['results'][238]['city_name'] }}</option>
                                                    <option value="239">{{ $array_result2['rajaongkir']['results'][239]['city_name'] }}</option>
                                                    <option value="240">{{ $array_result2['rajaongkir']['results'][240]['city_name'] }}</option>
                                                    <option value="275">{{ $array_result2['rajaongkir']['results'][275]['city_name'] }}</option>
                                                    <option value="437">{{ $array_result2['rajaongkir']['results'][437]['city_name'] }}</option>
                                                    <option value="438">{{ $array_result2['rajaongkir']['results'][438]['city_name'] }}</option>
                                                </select>
                                            </div>
                                            <div id="k23">
                                                <select class="shipping_select" id="kota23" name="city">
                                                    <option value="" disabled selected> -- Pilih Kota --</option>
                                                    <option value="12">{{ $array_result2['rajaongkir']['results'][12]['city_name'] }}</option>
                                                    <option value="57">{{ $array_result2['rajaongkir']['results'][57]['city_name'] }}</option>
                                                    <option value="121">{{ $array_result2['rajaongkir']['results'][121]['city_name'] }}</option>
                                                    <option value="124">{{ $array_result2['rajaongkir']['results'][124]['city_name'] }}</option>
                                                    <option value="211">{{ $array_result2['rajaongkir']['results'][211]['city_name'] }}</option>
                                                    <option value="212">{{ $array_result2['rajaongkir']['results'][212]['city_name'] }}</option>
                                                    <option value="233">{{ $array_result2['rajaongkir']['results'][233]['city_name'] }}</option>
                                                    <option value="268">{{ $array_result2['rajaongkir']['results'][268]['city_name'] }}</option>
                                                    <option value="269">{{ $array_result2['rajaongkir']['results'][269]['city_name'] }}</option>
                                                    <option value="270">{{ $array_result2['rajaongkir']['results'][270]['city_name'] }}</option>
                                                    <option value="300">{{ $array_result2['rajaongkir']['results'][300]['city_name'] }}</option>
                                                    <option value="303">{{ $array_result2['rajaongkir']['results'][303]['city_name'] }}</option>
                                                    <option value="382">{{ $array_result2['rajaongkir']['results'][382]['city_name'] }}</option>
                                                    <option value="384">{{ $array_result2['rajaongkir']['results'][384]['city_name'] }}</option>
                                                    <option value="411">{{ $array_result2['rajaongkir']['results'][411]['city_name'] }}</option>
                                                    <option value="433">{{ $array_result2['rajaongkir']['results'][433]['city_name'] }}</option>
                                                    <option value="434">{{ $array_result2['rajaongkir']['results'][434]['city_name'] }}</option>
                                                    <option value="435">{{ $array_result2['rajaongkir']['results'][435]['city_name'] }}</option>
                                                    <option value="436">{{ $array_result2['rajaongkir']['results'][436]['city_name'] }}</option>
                                                    <option value="478">{{ $array_result2['rajaongkir']['results'][478]['city_name'] }}</option>
                                                    <option value="479">{{ $array_result2['rajaongkir']['results'][479]['city_name'] }}</option>
                                                </select>
                                            </div>
                                            <div id="k24">
                                                <select class="shipping_select" id="kota24" name="city">
                                                    <option value="" disabled selected> -- Pilih Kota --</option>
                                                    <option value="15">{{ $array_result2['rajaongkir']['results'][15]['city_name'] }}</option>
                                                    <option value="66">{{ $array_result2['rajaongkir']['results'][66]['city_name'] }}</option>
                                                    <option value="89">{{ $array_result2['rajaongkir']['results'][89]['city_name'] }}</option>
                                                    <option value="110">{{ $array_result2['rajaongkir']['results'][110]['city_name'] }}</option>
                                                    <option value="116">{{ $array_result2['rajaongkir']['results'][116]['city_name'] }}</option>
                                                    <option value="149">{{ $array_result2['rajaongkir']['results'][149]['city_name'] }}</option>
                                                    <option value="156">{{ $array_result2['rajaongkir']['results'][156]['city_name'] }}</option>
                                                    <option value="157">{{ $array_result2['rajaongkir']['results'][157]['city_name'] }}</option>
                                                    <option value="158">{{ $array_result2['rajaongkir']['results'][158]['city_name'] }}</option>
                                                    <option value="179">{{ $array_result2['rajaongkir']['results'][179]['city_name'] }}</option>
                                                    <option value="192">{{ $array_result2['rajaongkir']['results'][192]['city_name'] }}</option>
                                                    <option value="230">{{ $array_result2['rajaongkir']['results'][230]['city_name'] }}</option>
                                                    <option value="262">{{ $array_result2['rajaongkir']['results'][262]['city_name'] }}</option>
                                                    <option value="263">{{ $array_result2['rajaongkir']['results'][263]['city_name'] }}</option>
                                                    <option value="273">{{ $array_result2['rajaongkir']['results'][273]['city_name'] }}</option>
                                                    <option value="280">{{ $array_result2['rajaongkir']['results'][280]['city_name'] }}</option>
                                                    <option value="283">{{ $array_result2['rajaongkir']['results'][283]['city_name'] }}</option>
                                                    <option value="298">{{ $array_result2['rajaongkir']['results'][298]['city_name'] }}</option>
                                                    <option value="302">{{ $array_result2['rajaongkir']['results'][302]['city_name'] }}</option>
                                                    <option value="334">{{ $array_result2['rajaongkir']['results'][334]['city_name'] }}</option>
                                                    <option value="346">{{ $array_result2['rajaongkir']['results'][346]['city_name'] }}</option>
                                                    <option value="372">{{ $array_result2['rajaongkir']['results'][372]['city_name'] }}</option>
                                                    <option value="373">{{ $array_result2['rajaongkir']['results'][373]['city_name'] }}</option>
                                                    <option value="391">{{ $array_result2['rajaongkir']['results'][391]['city_name'] }}</option>
                                                    <option value="442">{{ $array_result2['rajaongkir']['results'][442]['city_name'] }}</option>
                                                    <option value="483">{{ $array_result2['rajaongkir']['results'][483]['city_name'] }}</option>
                                                    <option value="494">{{ $array_result2['rajaongkir']['results'][494]['city_name'] }}</option>
                                                    <option value="498">{{ $array_result2['rajaongkir']['results'][498]['city_name'] }}</option>
                                                    <option value="499">{{ $array_result2['rajaongkir']['results'][499]['city_name'] }}</option>
                                                </select>
                                            </div>
                                            <div id="k25">
                                                <select class="shipping_select" id="kota25" name="city">
                                                    <option value="" disabled selected> -- Pilih Kota --</option>
                                                    <option value="123">{{ $array_result2['rajaongkir']['results'][123]['city_name'] }}</option>
                                                    <option value="164">{{ $array_result2['rajaongkir']['results'][164]['city_name'] }}</option>
                                                    <option value="271">{{ $array_result2['rajaongkir']['results'][271]['city_name'] }}</option>
                                                    <option value="272">{{ $array_result2['rajaongkir']['results'][272]['city_name'] }}</option>
                                                    <option value="276">{{ $array_result2['rajaongkir']['results'][276]['city_name'] }}</option>
                                                    <option value="345">{{ $array_result2['rajaongkir']['results'][345]['city_name'] }}</option>
                                                    <option value="377">{{ $array_result2['rajaongkir']['results'][377]['city_name'] }}</option>
                                                    <option value="423">{{ $array_result2['rajaongkir']['results'][423]['city_name'] }}</option>
                                                    <option value="424">{{ $array_result2['rajaongkir']['results'][424]['city_name'] }}</option>
                                                    <option value="425">{{ $array_result2['rajaongkir']['results'][425]['city_name'] }}</option>
                                                    <option value="448">{{ $array_result2['rajaongkir']['results'][448]['city_name'] }}</option>
                                                    <option value="473">{{ $array_result2['rajaongkir']['results'][473]['city_name'] }}</option>
                                                    <option value="474">{{ $array_result2['rajaongkir']['results'][474]['city_name'] }}</option>
                                                </select>
                                            </div>
                                            <div id="k26">
                                                <select class="shipping_select" id="kota26" name="city">
                                                    <option value="" disabled selected> -- Pilih Kota --</option>
                                                    <option value="59">{{ $array_result2['rajaongkir']['results'][59]['city_name'] }}</option>
                                                    <option value="119">{{ $array_result2['rajaongkir']['results'][119]['city_name'] }}</option>
                                                    <option value="146">{{ $array_result2['rajaongkir']['results'][146]['city_name'] }}</option>
                                                    <option value="147">{{ $array_result2['rajaongkir']['results'][147]['city_name'] }}</option>
                                                    <option value="165">{{ $array_result2['rajaongkir']['results'][165]['city_name'] }}</option>
                                                    <option value="186">{{ $array_result2['rajaongkir']['results'][186]['city_name'] }}</option>
                                                    <option value="206">{{ $array_result2['rajaongkir']['results'][206]['city_name'] }}</option>
                                                    <option value="349">{{ $array_result2['rajaongkir']['results'][349]['city_name'] }}</option>
                                                    <option value="350">{{ $array_result2['rajaongkir']['results'][350]['city_name'] }}</option>
                                                    <option value="380">{{ $array_result2['rajaongkir']['results'][380]['city_name'] }}</option>
                                                    <option value="381">{{ $array_result2['rajaongkir']['results'][381]['city_name'] }}</option>
                                                    <option value="405">{{ $array_result2['rajaongkir']['results'][405]['city_name'] }}</option>
                                                </select>
                                            </div>
                                            <div id="k27">
                                                <select class="shipping_select" id="kota27" name="city">
                                                    <option value="" disabled selected> -- Pilih Kota --</option>
                                                    <option value="252">{{ $array_result2['rajaongkir']['results'][252]['city_name'] }}</option>
                                                    <option value="261">{{ $array_result2['rajaongkir']['results'][261]['city_name'] }}</option>
                                                    <option value="264">{{ $array_result2['rajaongkir']['results'][264]['city_name'] }}</option>
                                                    <option value="265">{{ $array_result2['rajaongkir']['results'][265]['city_name'] }}</option>
                                                    <option value="361">{{ $array_result2['rajaongkir']['results'][361]['city_name'] }}</option>
                                                </select>
                                            </div>
                                            <div id="k28">
                                                <select class="shipping_select" id="kota28" name="city">
                                                    <option value="" disabled selected> -- Pilih Kota --</option>
                                                    <option value="37">{{ $array_result2['rajaongkir']['results'][37]['city_name'] }}</option>
                                                    <option value="46">{{ $array_result2['rajaongkir']['results'][46]['city_name'] }}</option>
                                                    <option value="86">{{ $array_result2['rajaongkir']['results'][86]['city_name'] }}</option>
                                                    <option value="94">{{ $array_result2['rajaongkir']['results'][94]['city_name'] }}</option>
                                                    <option value="122">{{ $array_result2['rajaongkir']['results'][122]['city_name'] }}</option>
                                                    <option value="131">{{ $array_result2['rajaongkir']['results'][131]['city_name'] }}</option>
                                                    <option value="161">{{ $array_result2['rajaongkir']['results'][161]['city_name'] }}</option>
                                                    <option value="243">{{ $array_result2['rajaongkir']['results'][243]['city_name'] }}</option>
                                                    <option value="244">{{ $array_result2['rajaongkir']['results'][244]['city_name'] }}</option>
                                                    <option value="245">{{ $array_result2['rajaongkir']['results'][245]['city_name'] }}</option>
                                                    <option value="253">{{ $array_result2['rajaongkir']['results'][253]['city_name'] }}</option>
                                                    <option value="274">{{ $array_result2['rajaongkir']['results'][274]['city_name'] }}</option>
                                                    <option value="327">{{ $array_result2['rajaongkir']['results'][327]['city_name'] }}</option>
                                                    <option value="332">{{ $array_result2['rajaongkir']['results'][332]['city_name'] }}</option>
                                                    <option value="335">{{ $array_result2['rajaongkir']['results'][335]['city_name'] }}</option>
                                                    <option value="359">{{ $array_result2['rajaongkir']['results'][359]['city_name'] }}</option>
                                                    <option value="395">{{ $array_result2['rajaongkir']['results'][395]['city_name'] }}</option>
                                                    <option value="407">{{ $array_result2['rajaongkir']['results'][407]['city_name'] }}</option>
                                                    <option value="415">{{ $array_result2['rajaongkir']['results'][415]['city_name'] }}</option>
                                                    <option value="422">{{ $array_result2['rajaongkir']['results'][422]['city_name'] }}</option>
                                                    <option value="447">{{ $array_result2['rajaongkir']['results'][447]['city_name'] }}</option>
                                                    <option value="450">{{ $array_result2['rajaongkir']['results'][450]['city_name'] }}</option>
                                                    <option value="485">{{ $array_result2['rajaongkir']['results'][485]['city_name'] }}</option>
                                                    <option value="492">{{ $array_result2['rajaongkir']['results'][492]['city_name'] }}</option>
                                                </select>
                                            </div>
                                            <div id="k29">
                                                <select class="shipping_select" id="kota29" name="city">
                                                    <option value="" disabled selected> -- Pilih Kota --</option>
                                                    <option value="24">{{ $array_result2['rajaongkir']['results'][24]['city_name'] }}</option>
                                                    <option value="25">{{ $array_result2['rajaongkir']['results'][25]['city_name'] }}</option>
                                                    <option value="97">{{ $array_result2['rajaongkir']['results'][97]['city_name'] }}</option>
                                                    <option value="118">{{ $array_result2['rajaongkir']['results'][118]['city_name'] }}</option>
                                                    <option value="290">{{ $array_result2['rajaongkir']['results'][290]['city_name'] }}</option>
                                                    <option value="328">{{ $array_result2['rajaongkir']['results'][328]['city_name'] }}</option>
                                                    <option value="337">{{ $array_result2['rajaongkir']['results'][337]['city_name'] }}</option>
                                                    <option value="365">{{ $array_result2['rajaongkir']['results'][365]['city_name'] }}</option>
                                                    <option value="409">{{ $array_result2['rajaongkir']['results'][409]['city_name'] }}</option>
                                                    <option value="481">{{ $array_result2['rajaongkir']['results'][481]['city_name'] }}</option>
                                                    <option value="482">{{ $array_result2['rajaongkir']['results'][482]['city_name'] }}</option>
                                                </select>
                                            </div>
                                            <div id="k30">
                                                <select class="shipping_select" id="kota30" name="city">
                                                    <option value="" disabled selected> -- Pilih Kota --</option>
                                                    <option value="52">{{ $array_result2['rajaongkir']['results'][52]['city_name'] }}</option>
                                                    <option value="84">{{ $array_result2['rajaongkir']['results'][84]['city_name'] }}</option>
                                                    <option value="100">{{ $array_result2['rajaongkir']['results'][100]['city_name'] }}</option>
                                                    <option value="101">{{ $array_result2['rajaongkir']['results'][101]['city_name'] }}</option>
                                                    <option value="181">{{ $array_result2['rajaongkir']['results'][181]['city_name'] }}</option>
                                                    <option value="198">{{ $array_result2['rajaongkir']['results'][198]['city_name'] }}</option>
                                                    <option value="199">{{ $array_result2['rajaongkir']['results'][199]['city_name'] }}</option>
                                                    <option value="200">{{ $array_result2['rajaongkir']['results'][200]['city_name'] }}</option>
                                                    <option value="201">{{ $array_result2['rajaongkir']['results'][201]['city_name'] }}</option>
                                                    <option value="294">{{ $array_result2['rajaongkir']['results'][294]['city_name'] }}</option>
                                                    <option value="493">{{ $array_result2['rajaongkir']['results'][493]['city_name'] }}</option>
                                                </select>
                                            </div>
                                            <div id="k31">
                                                <select class="shipping_select" id="kota31" name="city">
                                                    <option value="" disabled selected> -- Pilih Kota --</option>
                                                    <option value="72">{{ $array_result2['rajaongkir']['results'][72]['city_name'] }}</option>
                                                    <option value="80">{{ $array_result2['rajaongkir']['results'][80]['city_name'] }}</option>
                                                    <option value="81">{{ $array_result2['rajaongkir']['results'][81]['city_name'] }}</option>
                                                    <option value="82">{{ $array_result2['rajaongkir']['results'][82]['city_name'] }}</option>
                                                    <option value="83">{{ $array_result2['rajaongkir']['results'][83]['city_name'] }}</option>
                                                    <option value="187">{{ $array_result2['rajaongkir']['results'][187]['city_name'] }}</option>
                                                    <option value="189">{{ $array_result2['rajaongkir']['results'][189]['city_name'] }}</option>
                                                    <option value="191">{{ $array_result2['rajaongkir']['results'][191]['city_name'] }}</option>
                                                    <option value="203">{{ $array_result2['rajaongkir']['results'][203]['city_name'] }}</option>
                                                    <option value="266">{{ $array_result2['rajaongkir']['results'][266]['city_name'] }}</option>
                                                    <option value="284">{{ $array_result2['rajaongkir']['results'][284]['city_name'] }}</option>
                                                    <option value="285">{{ $array_result2['rajaongkir']['results'][285]['city_name'] }}</option>
                                                    <option value="286">{{ $array_result2['rajaongkir']['results'][286]['city_name'] }}</option>
                                                    <option value="287">{{ $array_result2['rajaongkir']['results'][287]['city_name'] }}</option>
                                                    <option value="484">{{ $array_result2['rajaongkir']['results'][484]['city_name'] }}</option>
                                                </select>
                                            </div>
                                            <div id="k32">
                                                <select class="shipping_select" id="kota32" name="city">
                                                    <option value="" disabled selected> -- Pilih Kota --</option>
                                                    <option value="11">{{ $array_result2['rajaongkir']['results'][11]['city_name'] }}</option>
                                                    <option value="92">{{ $array_result2['rajaongkir']['results'][92]['city_name'] }}</option>
                                                    <option value="115">{{ $array_result2['rajaongkir']['results'][115]['city_name'] }}</option>
                                                    <option value="185">{{ $array_result2['rajaongkir']['results'][185]['city_name'] }}</option>
                                                    <option value="235">{{ $array_result2['rajaongkir']['results'][235]['city_name'] }}</option>
                                                    <option value="317">{{ $array_result2['rajaongkir']['results'][317]['city_name'] }}</option>
                                                    <option value="320">{{ $array_result2['rajaongkir']['results'][320]['city_name'] }}</option>
                                                    <option value="321">{{ $array_result2['rajaongkir']['results'][321]['city_name'] }}</option>
                                                    <option value="336">{{ $array_result2['rajaongkir']['results'][336]['city_name'] }}</option>
                                                    <option value="338">{{ $array_result2['rajaongkir']['results'][338]['city_name'] }}</option>
                                                    <option value="339">{{ $array_result2['rajaongkir']['results'][339]['city_name'] }}</option>
                                                    <option value="344">{{ $array_result2['rajaongkir']['results'][344]['city_name'] }}</option>
                                                    <option value="356">{{ $array_result2['rajaongkir']['results'][356]['city_name'] }}</option>
                                                    <option value="393">{{ $array_result2['rajaongkir']['results'][393]['city_name'] }}</option>
                                                    <option value="410">{{ $array_result2['rajaongkir']['results'][410]['city_name'] }}</option>
                                                    <option value="419">{{ $array_result2['rajaongkir']['results'][419]['city_name'] }}</option>
                                                    <option value="420">{{ $array_result2['rajaongkir']['results'][420]['city_name'] }}</option>
                                                    <option value="421">{{ $array_result2['rajaongkir']['results'][421]['city_name'] }}</option>
                                                    <option value="452">{{ $array_result2['rajaongkir']['results'][452]['city_name'] }}</option>
                                                </select>
                                            </div>
                                            <div id="k33">
                                                <select class="shipping_select" id="kota33" name="city">
                                                    <option value="" disabled selected> -- Pilih Kota --</option>
                                                    <option value="39">{{ $array_result2['rajaongkir']['results'][39]['city_name'] }}</option>
                                                    <option value="120">{{ $array_result2['rajaongkir']['results'][120]['city_name'] }}</option>
                                                    <option value="219">{{ $array_result2['rajaongkir']['results'][219]['city_name'] }}</option>
                                                    <option value="241">{{ $array_result2['rajaongkir']['results'][241]['city_name'] }}</option>
                                                    <option value="291">{{ $array_result2['rajaongkir']['results'][291]['city_name'] }}</option>
                                                    <option value="296">{{ $array_result2['rajaongkir']['results'][296]['city_name'] }}</option>
                                                    <option value="297">{{ $array_result2['rajaongkir']['results'][297]['city_name'] }}</option>
                                                    <option value="311">{{ $array_result2['rajaongkir']['results'][311]['city_name'] }}</option>
                                                    <option value="312">{{ $array_result2['rajaongkir']['results'][312]['city_name'] }}</option>
                                                    <option value="313">{{ $array_result2['rajaongkir']['results'][313]['city_name'] }}</option>
                                                    <option value="314">{{ $array_result2['rajaongkir']['results'][314]['city_name'] }}</option>
                                                    <option value="315">{{ $array_result2['rajaongkir']['results'][315]['city_name'] }}</option>
                                                    <option value="323">{{ $array_result2['rajaongkir']['results'][323]['city_name'] }}</option>
                                                    <option value="326">{{ $array_result2['rajaongkir']['results'][326]['city_name'] }}</option>
                                                    <option value="366">{{ $array_result2['rajaongkir']['results'][366]['city_name'] }}</option>
                                                </select>
                                            </div>
                                            <select class="shipping_select" name="courier" required> 
                                                    <option value="" disabled selected> -- Pilih Kurir --</option>
                                                    <option value="JNE OKE">JNE OKE</option>
                                                    <option value="JNE REG">JNE REG</option>
                                                    <option value="JNE YES">JNE YES</option>
                                                    <option value="TIKI ECO">TIKI ECO</option>
                                                    <option value="TIKI REG">TIKI REG</option>
                                                    <option value="TIKI ONS">TIKI ONS</option>
                                                    <option value="POS INDONESIA PAKET KILAT KHUSUS">POS INDONESIA PAKET KILAT KHUSUS</option>
                                                    <option value="POS INDONESIA EXPRESS NEXT DAY BARANG">POS INDONESIA EXPRESS NEXT DAY BARANG</option>
                                            </select>
                                            <input type="text" name="address" placeholder="Alamat" required>
                                        </div>
                                            
                                        
                                        
                                    </td>
                                </tr>
                                <tr class="out_button_area">
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        <div class="checkout_btn_inner d-flex align-items-center">
                                            <a class="gray_btn" href="category">Continue Shopping</a>
                                            <button class="primary-btn" type="submit">Proceed to checkout</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </form>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->
@endsection