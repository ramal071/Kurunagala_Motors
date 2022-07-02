@extends('admin/layouts.master')
@section('title', 'View job detail')
@section('body')
@include('admin.message')

<link rel="license" href="http://www.opensource.org/licenses/mit-license/">

<style type="text/css">
    /* reset */

    *{
      border: 0;
      box-sizing: content-box;
      color: inherit;
      font-family: inherit;
      font-size: inherit;
      font-style: inherit;
      font-weight: inherit;
      line-height: inherit;
      list-style: none;
      margin: 0;
      padding: 0;
      text-decoration: none;
      vertical-align: top;
    }

    /* content editable */

    *[contenteditable] { border-radius: 0.25em; min-width: 1em; outline: 0;  cursor: pointer; display: inline-block;}

    *[contenteditable]:hover, *[contenteditable]:focus, td:hover *[contenteditable], td:focus *[contenteditable], img.hover { background: #DEF; box-shadow: 0 0 1em 0.5em #DEF; }

    /*span[contenteditable] { display: inline-block; }*/

    /* heading */

    h1 { font: bold 100% Ubuntu, Arial, sans-serif; text-align: center; text-transform: uppercase; }

    /* table */

    table { font-size: 75%; table-layout: fixed; width: 100%; }
    table { border-collapse: separate; border-spacing: 2px; }
    th, td { border-width: 1px; padding: 0.5em; position: relative; text-align: left; }
    th, td { border-radius: 0.25em; border-style: solid; }
    th { background: #EEE; border-color: #BBB; }
    td { border-color: #DDD; }

    /* page */

    html { font: 16px/1 'Open Sans', sans-serif; overflow: auto; }
    html { background: #fff; cursor: default; }

    body { box-sizing: border-box; margin:0;}
    #wrapper{height: 29.7cm; margin: 0 auto; width: 21cm; }
    body { background: #FFF;}

    /* header */

    header { margin: 0 0 3em; }
    header:after { clear: both; content: ""; display: table; }

    /* header h1 { background: #000; border-radius: 0.25em; color: #FFF; margin: 0 0 1em; padding: 0.5em 0; }
    header address { float: left; font-size: 75%; font-style: normal; line-height: 1.25; margin: 0 1em 1em 0; }
    header address p { margin: 0 0 0.25em; }
    header span { display: block }
    header span { margin: 0 0 1em 1em; max-height: 25%; max-width: 60%; position: relative; }
    header img { max-height: 100%; max-width: 50%; }
    header input { cursor: pointer; -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"; height: 100%; left: 0; opacity: 0; position: absolute; top: 0; width: 100%; } */

    /* article */

    article, article address, table.meta, table.inventory { margin: 0 0 3em; }
    article:after { clear: both; content: ""; display: table; }
    article h1 { clip: rect(0 0 0 0); position: absolute; }

    article address { float: left; font-size: 125%; font-weight: bold; }

    /* table meta & balance */

    table.meta, table.balance { float: right; width: 36%; }
    table.meta:after, table.balance:after { clear: both; content: ""; display: table; }

    /* table meta */

    table.meta th { width: 40%; }
    table.meta td { width: 60%; }

    /* table items */

    table.inventory { clear: both; width: 100%; }
    table.inventory th { font-weight: bold; text-align: center; }

    table.inventory td:nth-child(1) { width: 26%; }
    table.inventory td:nth-child(2) { width: 38%; }
    table.inventory td:nth-child(3) { text-align: right; width: 12%; }
    table.inventory td:nth-child(4) { text-align: right; width: 12%; }
    table.inventory td:nth-child(5) { text-align: right; width: 12%; }

    /* table balance */

    table.balance th, table.balance td { width: 50%; }
    table.balance td { text-align: right; }

    /* aside */

    aside h1 { border: none; border-width: 0 0 1px; margin: 0 0 1em; }
    aside h1 { border-color: #999; border-bottom-style: solid; }

    .cutw{position:relative;}
    /* javascript */

    .add, .cut
    {
      border-width: 1px;
      display: block;
      font-size: .8em;
      padding: 0.25em;
      float: left;
      text-align: center;
      width:0.8em;
    }
    .cut{font-size:1em;}

    .add, .cut
    {
      background: #9AF;
      box-shadow: 0 1px 2px rgba(0,0,0,0.2);
      background-image: -moz-linear-gradient(#00ADEE 5%, #0078A5 100%);
      background-image: -webkit-linear-gradient(#00ADEE 5%, #0078A5 100%);
      border-radius: 0.5em;
      border-color: #0076A3;
      color: #FFF;
      cursor: pointer;
      font-weight: bold;
      text-shadow: 0 -1px 2px rgba(0,0,0,0.333);
    }

    .add { margin: -2.5em 0 0; }

    .add:hover { background: #00ADEE; }

    .cut { opacity: 0; position: absolute; top: 0; left: -1.5em; }

    tr:hover .cut { opacity: 1; }

    @media print {
      * { -webkit-print-color-adjust: exact; }
      html { background: none; padding: 0; }
      body { box-shadow: none; margin: 0; }
      span:empty { display: none; }
      .add, .cut { display: none; }
    }

    @page { margin: 0; }
  </style>
  
  <script>
    function generateTableRow(){var a=document.createElement("tr");return a.innerHTML='<td><div class="cutw"><a class="cut">-</a></div><span contenteditable></span></td><td><span contenteditable></span></td><td><span data-prefix>$</span><span contenteditable>0.00</span></td><td><span contenteditable>0</span></td><td><span data-prefix>$</span><span>0.00</span></td>',a}function parseFloatHTML(a){return parseFloat(a.innerHTML.replace(/[^\d\.\-]+/g,""))||0}function parsePrice(a){return a.toFixed(2).replace(/(\d)(?=(\d\d\d)+([^\d]|$))/g,"$1,")}function updateNumber(a){var b=document.activeElement,c=parseFloat(b.innerHTML),d=b.innerHTML==parsePrice(parseFloatHTML(b));isNaN(c)||38!=a.keyCode&&40!=a.keyCode&&!a.wheelDeltaY||(a.preventDefault(),c+=38==a.keyCode?1:40==a.keyCode?-1:Math.round(.025*a.wheelDelta),c=Math.max(c,0),b.innerHTML=d?parsePrice(c):c),updateInvoice()}function updateInvoice(){for(var b,c,a,d,e,a=0,d=document.querySelectorAll("table.inventory tbody tr"),e=0;d[e];++e)b=d[e].querySelectorAll("span:last-child"),c=parseFloatHTML(b[2])*parseFloatHTML(b[3]),a+=c,b[4].innerHTML=c;b=document.querySelectorAll("table.balance td:last-child span:last-child"),b[0].innerHTML=a,b[2].innerHTML=document.querySelector("table.meta tr:last-child td:last-child span:last-child").innerHTML=parsePrice(a-parseFloatHTML(b[1]));var f=document.querySelector("#prefix").innerHTML;for(d=document.querySelectorAll("[data-prefix]"),e=0;d[e];++e)d[e].innerHTML=f;for(d=document.querySelectorAll("span[data-prefix] + span"),e=0;d[e];++e)document.activeElement!=d[e]&&(d[e].innerHTML=parsePrice(parseFloatHTML(d[e])))}function onContentLoad(){function c(a){var c,b=a.target.querySelector("[contenteditable]");b&&a.target!=document.documentElement&&a.target!=document.body&&b.focus(),a.target.matchesSelector(".add")?document.querySelector("table.inventory tbody").appendChild(generateTableRow()):"cut"==a.target.className&&(c=a.target.ancestorQuerySelector("tr"),c.parentNode.removeChild(c)),updateInvoice()}function d(a){a.preventDefault(),b.classList.add("hover")}function e(a){a.preventDefault(),b.classList.remove("hover")}function f(a){b.classList.remove("hover");var c=new FileReader,d=a.dataTransfer?a.dataTransfer.files:a.target.files,e=0;for(c.onload=g;d[e];)c.readAsDataURL(d[e++])}function g(a){var c=a.target.result;b.src=c}updateInvoice();var a=document.querySelector("input"),b=document.querySelector("img");window.addEventListener&&(document.addEventListener("click",c),document.addEventListener("mousewheel",updateNumber),document.addEventListener("keydown",updateNumber),document.addEventListener("keydown",updateInvoice),document.addEventListener("keyup",updateInvoice),a.addEventListener("focus",d),a.addEventListener("mouseover",d),a.addEventListener("dragover",d),a.addEventListener("dragenter",d),a.addEventListener("blur",e),a.addEventListener("dragleave",e),a.addEventListener("mouseout",e),a.addEventListener("drop",f),a.addEventListener("change",f))}(function(a){for(var f,b=a.head=a.getElementsByTagName("head")[0]||a.documentElement,c="article aside audio bdi canvas data datalist details figcaption figure footer header hgroup mark meter nav output picture progress section summary time video x".split(" "),d=c.length,e=0;d>e;)f=a.createElement(c[++e]);return f.innerHTML="x<style>article,aside,details,figcaption,figure,footer,header,hgroup,nav,section{display:block}audio[controls],canvas,video{display:inline-block}[hidden],audio{display:none}mark{background:#FF0;color:#000}</style>",b.insertBefore(f.lastChild,b.firstChild)})(document),function(a,b,c,d){function e(){}e.prototype.length=c.length,b.matchesSelector=b.matchesSelector||b.mozMatchesSelector||b.msMatchesSelector||b.oMatchesSelector||b.webkitMatchesSelector||function(a){return c.indexOf.call(this.parentNode.querySelectorAll(a),this)>-1},b.ancestorQuerySelectorAll=b.ancestorQuerySelectorAll||b.mozAncestorQuerySelectorAll||b.msAncestorQuerySelectorAll||b.oAncestorQuerySelectorAll||b.webkitAncestorQuerySelectorAll||function(a){for(var b=this,d=new e;b=b.parentElement;)b.matchesSelector(a)&&c.push.call(d,b);return d},b.ancestorQuerySelector=b.ancestorQuerySelector||b.mozAncestorQuerySelector||b.msAncestorQuerySelector||b.oAncestorQuerySelector||b.webkitAncestorQuerySelector||function(a){return this.ancestorQuerySelectorAll(a)[0]||null}}(this,Element.prototype,Array.prototype),window.addEventListener&&document.addEventListener("DOMContentLoaded",onContentLoad);
  </script>
  
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">  {{-- red line --}}
                <div id="wrapper">
                    <header>
                      <h1>Invoice</h1>
                      <address contenteditable>
                        <p>Krunagala Motor</p>
                        <p>Galenbidunuwewa<br>Anuradhapura, Sri lanka</p>
                        <p>(+94)71-7097-116</p>
                      </address>
                    </header>



                    <article>
                      <h1>Recipient</h1>
                      <address contenteditable>
                        <p>{{__('adminstaticword.customer') }}: {{ $servicerepair->users->fname}} {{ $servicerepair->users->lname}} <br>{{__('adminstaticword.registernumber') }}: {{ $servicerepair->customervehicle->register_number }}</p>
                      </address>

                      <table class="meta">


                        <tr>
                          <th><span contenteditable>Invoice Job Id #</span></th>
                          <td><span contenteditable>{{ $servicerepair->code}}</span></td>
                        </tr>
                        <tr>
                          <th><span contenteditable>Employee</span></th>
                          <td><span contenteditable>
                            @foreach ($servicerepair->employee as $e)
                            <li>
                                {{$e->name}}
                            </li>
                            @endforeach    
                        </span></td>
                        </tr>
                        <tr>
                            <th><span contenteditable>ID Number</span></th>
                            <td><span contenteditable>{{ $servicerepair->users->idno}}</span></td>
                          </tr>
                        <tr>
                          <th><span contenteditable>Amount Due</span></th>
                          <td><span id="prefix" contenteditable>$</span><span>600.00</span></td>
                        </tr>
                      </table>
                      <table class="inventory">
                        <thead>
                          <tr>
                            <th><span contenteditable>service</span></th>
                            <th><span contenteditable>service price</span></th>
                            <th><span contenteditable>product</span></th>
                            <th><span contenteditable>product price</span></th>
                            <th><span contenteditable>Rate</span></th>
                            <th><span contenteditable>Quantity</span></th>
                            <th><span contenteditable>Price</span></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><a class="cut">-</a><span contenteditable>                             
                                @foreach ($servicerepair->service as $s)
                                <li>
                                    {{$s->name}}
                                </li>
                                @endforeach                             
                            </span></td>

                            <td><a class="cut">-</a><span contenteditable>                             
                                @foreach ($servicerepair->service as $s)
                                <li>
                                    {{$s->price}}
                                </li>
                                @endforeach                             
                            </span></td>

                            <td><span contenteditable> 
                                @foreach ($servicerepair->stock as $s)
                                <ul>  <li>
                                  {{$s->product->brand->name}} {{$s->product->bike->name}} {{$s->product->name}}
                                </li> </ul>
                                @endforeach
                            </span></td>

                            <td><span contenteditable> 
                                @foreach ($servicerepair->stock as $s)
                                <ul>  <li>
                                  {{$s->sellingprice}}
                                </li> </ul>
                                @endforeach
                            </span></td>
                            <td><span data-prefix>$</span><span contenteditable></span></td>
                            <td><span contenteditable>1</span></td>
                            <td><span data-prefix>$</span><span>600.00</span></td>
                          </tr>
                        </tbody>

                      
                      </table>
                      <a class="add">+</a>
                      <table class="balance">
                        <tr>
                          <th><span contenteditable>Total</span></th>
                          <td><span data-prefix>$</span><span>600.00</span></td>
                        </tr>
                        <tr>
                          <th><span contenteditable>Amount Paid</span></th>
                          <td><span data-prefix>$</span><span contenteditable>0.00</span></td>
                        </tr>
                        <tr>
                          <th><span contenteditable>Balance Due</span></th>
                          <td><span data-prefix>$</span><span>600.00</span></td>
                        </tr>
                      </table>
                    </article>
                    <aside>
                      <h1><span contenteditable>Additional Notes</span></h1>
                      <div contenteditable>
                        <p>A finance charge will be made on unpaid balances after 30 days.</p>
                      </div>
                    </aside>
                  </div>
                
            </div>
        </div>
    </div>
</section>  

@endsection