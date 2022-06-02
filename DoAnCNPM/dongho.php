<?php
session_start();
require("Database/KetNoi.php"); 
?>
<html>
<head>
<meta charset="UTF-8"/>
<link rel="stylesheet" href="Heade/heade.css">
<link rel="stylesheet" href="seach.css">
<link rel="stylesheet" href="Footer/footer.css">
<style>
#xem{
  height:40px;
  width:100%;
  background:#ece7e7;
  margin-top:5%;
  margin-left:15%;  
}
.filter{display:block;height:40px;width:100%}
.filter li{display:inline-block;height:40px;width:auto;vertical-align:top;font-size:12px;position:relative;white-space:nowrap}
.filter li.ltext{line-height:35px}
.filter li.frange{margin-right:10px}
.filter li>a{color:#288ad6;display:inline-block;vertical-align:top;padding-left:10px;line-height:40px}
.filter li a:hover{color:#333}
.filter li div.fsub a{color:#333;text-align:right}
.filter li label.all a{color:#288ad6}
.filter li label.check a{padding-left:2px}
.filter li .criteria,.filter li .selected{display:inline-block;overflow:hidden;font-size:12px;padding:10px;color:#333;cursor:pointer;border:1px solid #333}
.filter li .criteria:after{content:'';width:0;height:0;border-top:4px solid #333;border-left:4px solid transparent;border-right:4px solid transparent;display:inline-block;vertical-align:middle;margin-left:5px}
.filter li div.fsub{display:none;overflow:visible;background:#ece7e7;border:1px solid #d9d9d9;border-radius:4px;box-shadow:0 10px 10px 0 rgba(0,0,0,.1);padding:5px 10px;position:absolute;width:220px;left:-50%;top:40px;z-index:11}
.filter li:hover div.fsub{display:block}
.filter li.frc .best{margin-left:20px}
.filter li.frc .check.new{margin-left:20px}
.filter li div:before,.filter li div:after{content:'';width:0;height:0;position:absolute;bottom:100%;left:45%;border-bottom:10px solid #d9d9d9;border-left:10px solid transparent;border-right:10px solid transparent}
.filter li div:after{border-width:9px;border-bottom-color:#fff;margin-left:1px}
.filter li div .all{display:block;overflow:hidden;border-bottom:1px solid #d9d9d9;font-size:14px;color:#333;padding:10px 0}
.filter li strong{font-size:14px}
.filter li aside{float:left;overflow:hidden;width:50%;padding:10px 0}
.filter li .rowfeature{float:none;width:100%;border-bottom:1px solid #d9d9d9;display:block;padding:0}
.filter li label{display:block;padding:5px 0 6px;cursor:pointer;text-indent:20px}
.filter li label:hover{color:#288ad6}
.filter li h1{display:inline-block;vertical-align:top;line-height:40px;padding-left:10px;font-size:16px;font-weight:bold;text-transform:uppercase;color:#666}
.filter li .sortprice{text-align:left;left:-140px!important}
.filter li .sortprice:before,.filter li .sortprice:after{left:auto;right:37px}
.filter li .sortprice:before{right:36px}
.filter li.sort-last{margin-right:10px}
div.fixwidth{width:380px!important}.fixwidth label{display:inline-block;width:49%;float:left}
.filter li .manufacture:before,.filter li .manufacture:after{left:15%!important}
#trang
{
  height:40px;
  width:100%;
  margin-top:0%;
  float:left;
}
.pagination{padding:15px 0 10px;font-size:14px;font-weight:bold;text-align:right;clear:both}
.pagination a{color:#333;margin-left:3px;padding:8px 15px;background-color:#fff;border:1px solid #333;border-radius:3px}
.pagination a:hover{color:#fff;text-decoration:none;background-color:#333;border-color:#333}
.pagination a.current{color:#fff;background-color:#333;border-color:#333}
.pagination span{padding:5px 10px}
.pagination{text-align:center}
</style>
</head>
<body>
<?php
require("Heade/heade.php");
?>	
  <div id="main">
  <div class="danhsach">
<?php
  $query="select * from tbsanpham where phanloai=0";
  $rs= mysqli_query($conn,$query);
  $count=0;
  while($row=mysqli_fetch_array($rs,MYSQLI_ASSOC))
  {
	$anh[$count]=$row['anh'];
	$ten[$count]=$row['tensp'];
	$gia[$count]=$row['gia'];
	$ma[$count]=$row['masp'];
	$count++;
  }
  for($i=0;$i<$count;$i++)
  { 
    echo "
	      <div class='list'>
	        <ul>
	          <li>
		        <a href ='sanpham.php?item=".$ma[$i]."' >
				  <img src='".$anh[$i]."'/>
				</a>
		        <p class='ten'> ".$ten[$i]."</p>
		        <p class='price'>Giá: ".number_format($gia[$i])."đ</p>
				<a class='see_move' href ='sanpham.php?item=".$ma[$i]."' >Xem chi tiết</a>
		      </li>
	        </ul>
	      </div>";
  }
  for($i=0;$i<$count;$i++)
  { 
    echo "
	      <div class='list'>
	        <ul>
	          <li>
		        <a href ='sanpham.php?item=".$ma[$i]."' >
				  <img src='".$anh[$i]."'/>
				</a>
		        <p class='ten'> ".$ten[$i]."</p>
		        <p class='price'>Giá: ".number_format($gia[$i])."đ</p>
				<a class='see_move' href ='sanpham.php?item=".$ma[$i]."' >Xem chi tiết</a>
		      </li>
	        </ul>
	      </div>";
  }
  
  
  $dem=0;
  $dem1=0;
  while($count>0)
  {
	$count=$count-4;
	$dem++;
	$dem1++;
  }
  $dem=$dem*500;
  $dem1=$dem1*500;
  echo "
        <script>
        document.getElementById('main').style.height='".$dem."';
		document.getElementById('trang').style.height='".$dem1."';
		</script>
  ";
?> 
 </div>
 <div id="trang">
 <form name="selectPageForm" action="https://trangsucvn.com/category.php" method="get">
        <p class="pagination">
            <a href="html-390-b0-min0-max0-attr0-1-goods_id-DESC.html" class="first">«</a>
            <a href="html-390-b0-min0-max0-attr0-1-goods_id-DESC.html" class="prev">‹</a>
                        <select name="page" id="page" onchange="selectPage(this)">
            <option value="1" selected>1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option><option value="60">60</option><option value="61">61</option><option value="62">62</option><option value="63">63</option><option value="64">64</option><option value="65">65</option><option value="66">66</option><option value="67">67</option><option value="68">68</option><option value="69">69</option><option value="70">70</option><option value="71">71</option><option value="72">72</option><option value="73">73</option><option value="74">74</option><option value="75">75</option><option value="76">76</option><option value="77">77</option><option value="78">78</option><option value="79">79</option><option value="80">80</option><option value="81">81</option><option value="82">82</option><option value="83">83</option><option value="84">84</option><option value="85">85</option><option value="86">86</option><option value="87">87</option><option value="88">88</option><option value="89">89</option><option value="90">90</option><option value="91">91</option><option value="92">92</option><option value="93">93</option><option value="94">94</option><option value="95">95</option><option value="96">96</option><option value="97">97</option><option value="98">98</option><option value="99">99</option><option value="100">100</option><option value="101">101</option><option value="102">102</option><option value="103">103</option><option value="104">104</option><option value="105">105</option><option value="106">106</option><option value="107">107</option><option value="108">108</option><option value="109">109</option><option value="110">110</option><option value="111">111</option><option value="112">112</option><option value="113">113</option><option value="114">114</option><option value="115">115</option><option value="116">116</option><option value="117">117</option><option value="118">118</option><option value="119">119</option><option value="120">120</option><option value="121">121</option><option value="122">122</option><option value="123">123</option><option value="124">124</option><option value="125">125</option><option value="126">126</option><option value="127">127</option><option value="128">128</option><option value="129">129</option><option value="130">130</option><option value="131">131</option><option value="132">132</option><option value="133">133</option><option value="134">134</option><option value="135">135</option><option value="136">136</option><option value="137">137</option><option value="138">138</option><option value="139">139</option><option value="140">140</option>            </select>            <a href="html-390-b0-min0-max0-attr0-2-goods_id-DESC.html" class="next">›</a>
            <a href="html-390-b0-min0-max0-attr0-140-goods_id-DESC.html" class="last">»</a>
                                    <input type="hidden" name="category" value="390" />
                                                <input type="hidden" name="keywords" value="" />
                                                <input type="hidden" name="sort" value="goods_id" />
                                                <input type="hidden" name="order" value="DESC" />
                                                <input type="hidden" name="cat" value="390" />
                                                <input type="hidden" name="brand" value="0" />
                                                <input type="hidden" name="price_min" value="0" />
                                                <input type="hidden" name="price_max" value="0" />
                                                <input type="hidden" name="filter_attr" value="0" />
                                                <input type="hidden" name="display" value="list" />
                                </p>
        </form>
</div>
</div>
  <?php
  include('Footer/footer.php');
?>
</body>
<script type="text/javascript">
        function selectPage(sel){sel.form.submit();}
        </script>
</html>