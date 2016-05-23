<!DOCTYPE>
<html>
<head>
<title>MAP</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>


<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.js"></script>


<script type="text/javascript" src="../src/redist/when.js"></script>
<script type="text/javascript" src="../src/core.js"></script>

<script type="text/javascript" src="../src/graphics.js"></script>

<script type="text/javascript" src="../src/mapimage.js"></script>
<script type="text/javascript" src="../src/mapdata.js"></script>
<script type="text/javascript" src="../src/areadata.js"></script>
<script type="text/javascript" src="../src/areacorners.js"></script>
<script type="text/javascript" src="../src/scale.js"></script>
<script type="text/javascript" src="../src/tooltip.js"></script>


<STYLE TYPE="text/css">

body
{
    font-family: Arial, Helvetica;
    font-size: 12px;
}
.navbar-brand{
    margin-top: 6px;
}
#map_demo{
    margin: 0 auto;
    margin-top: 50px;
}
#select{
  font-size: 70px;

}

</STYLE>
</head>

<body>
  <?php
  include ('navbar1.php');
  ?>


   </div><!-- /.navbar-collapse -->
 </div><!-- /.container-fluid -->
</nav>
<h1 id="select">Select city</h1>

<div id="map_demo" style="width:1220px; height:1000px;">
	<div style="width:1220px; border:0; overflow: hidden; float:left;">
		<img style="width:1220px;border:0;" id="usa_image" src="map.png" usemap="#usa" >
	</div>


    <div style="clear:both; height:8px;"></div>

</div>



<script type="text/javascript">
    if (window.Zepto) {
        jQuery = Zepto;
        (function ($) {
            if ($) {
                $.fn.prop = $.fn.attr;
            }
        } (jQuery));
    }

    $(document).ready(function () {

        var $statelist, $usamap, ratio,
        mapsterConfigured = function () {
            // set html settings values
            var opts = $usamap.mapster('get_options', null, true);
            if (!ratio) {
                ratio = $usamap.width() / $usamap.height();
            }
            $('#stroke_highlight').prop("checked", opts.render_highlight.stroke);
            $('#strokewidth_highlight').val(opts.render_highlight.strokeWidth);
            $('#fill_highlight').val(opts.render_highlight.fillOpacity);
            $('#strokeopacity_highlight').val(opts.render_highlight.strokeOpacity);
            $('#stroke_select').prop("checked", opts.render_select.stroke);
            $('#strokewidth_select').val(opts.render_select.strokeWidth);
            $('#fill_select').val(opts.render_select.fillOpacity);
            $('#strokeopacity_select').val(opts.render_select.strokeOpacity);
            $('#mouseout-delay').val(opts.mouseoutDelay);
            $('#img_width').val($usamap.width());
        },
        default_options =
        {
            fillOpacity: 0.5,
            render_highlight: {
                fillColor: '2aff00',
                stroke: true
            },
            render_select: {
                fillColor: 'ff000c',
                stroke: false
            },

            mouseoutDelay: 0,
            fadeInterval: 50,
            isSelectable: true,
            singleSelect: false,
            mapKey: 'state',
            mapValue: 'full',
            listKey: 'name',
            listSelectedAttribute: 'checked',
            sortList: "asc",

            onConfigured: mapsterConfigured,
            showToolTip: false,
            toolTipClose: ["area-mouseout"],
            areas: [
                { key: "TX",
                    toolTip: $('<div>Don\'t mess with Texas. Why? <a href="http://dontmesswithtexas.org/" target="_blank">Click here</a> for more info.</div>')

                },
                { key: "ME",
                    toolTip: $('<div style="margin:auto; width:100px;"><img src="images/lobster-small.gif"/></div><div style="clear:both;"></div><p>Trees, ocean, lobsters, it\'s all here.</p>'),
                    selected: true

                },
                { key: "AK",
                    toolTip: "Alaska.. wild, and cold. And, you cannot select this area, but you can see the tooltip.",
                    isSelectable: false
                },
                { key: "WA",
                    staticState: true
                },
                { key: "OR",
                    staticState: false
                }
                ]
        };

        function styleCheckbox(selected, $checkbox) {
            var nowWeight = selected ? "bold" : "normal";
            $checkbox.closest('div').css("font-weight", nowWeight);
        }

        $statelist = $('#statelist');
        $usamap = $('#usa_image');
        function bindlinks() {
            $('*').unbind();
            $("#unbind_link").bind("click", function (e) {
                e.preventDefault();
                $usamap.mapster("unbind");
                $usamap.width(1620);
                bindlinks();
            });
            $("#rebind_link").bind("click", function (e) {
                e.preventDefault();
                $usamap.mapster(default_options);
            });

            $("#unbind_link_preserve").bind("click", function (e) {
                e.preventDefault();
                $usamap.mapster("unbind", true);
                bindlinks();
            });
            $("#tooltip").bind("click", function (e) {
                e.preventDefault();
                var state = !$usamap.mapster('get_options').showToolTip;
                $('#tooltip_state').text(state ? "enabled" : "disabled");
                $usamap.mapster("set_options", { showToolTip: state });
            });
            $("#show_selected").bind("click", function (e) {
                e.preventDefault();
                $('#selections').text($("#usa_image").mapster("get"));
            });
            $("#single_select").bind("click", function (e) {
                e.preventDefault();
                var state = !$usamap.mapster('get_options').singleSelect;
                $('#single_select_state').text(state ? "enabled" : "disabled");
                $usamap.mapster("set_options", { singleSelect: state });
            });
            $("#is_deselectable").bind("click", function (e) {
                e.preventDefault();
                var state = !$usamap.mapster('get_options').isDeselectable;
                $('#is_deselectable_state').text(state ? "enabled" : "disabled");
                $usamap.mapster("set_options", { isDeselectable: state });
            });
            function getSelected(sel) {
            	var item=$();
            	sel.each(function() {
            		if (this.selected) {
            			item=item.add(this);
            			return false;
            		}

                });
                return item;

            }

            function getFillOptions(el) {
                var new_options,
					val = getSelected($(el).find("option")).val();

                if (val > "0") {
                    new_options = {
						altImage: 'images/usa_map_1220_alt_' + val + '.jpg',
						stroke: true
					};
                } else {
                    new_options = {
						altImage: null,
						stroke: false
                    };
                }
                return new_options;
            }


            $("#highlight_style, #select_style").bind("change", function (e) {
                e.preventDefault();
                $statelist.children().remove();

                $usamap.mapster(getNewOptions());

            });
            $("#update").click(function (e) {
                var newOpts = {};
                function setOption(base, opt, value) {
                    if (value !== '' && value !== null) {
                        base[opt] = value;
                    }
                }
                e.preventDefault();

                newOpts.render_highlight = {};
                setOption(newOpts.render_highlight, "stroke", $('#stroke_highlight').prop("checked"));

                setOption(newOpts.render_highlight, "strokeWidth", $('#strokewidth_highlight').val());
                setOption(newOpts.render_highlight, "fillOpacity", $('#fill_highlight').val());
                setOption(newOpts.render_highlight, "strokeOpacity", $('#strokeopacity_highlight').val());

                newOpts.render_select = {};
                setOption(newOpts.render_select, "stroke", $('#stroke_select').prop("checked"));
                setOption(newOpts.render_select, "strokeWidth", $('#strokewidth_select').val());
                setOption(newOpts.render_select, "fillOpacity", $('#fill_select').val());
                setOption(newOpts.render_select, "strokeOpacity", $('#strokeopacity_select').val());
                setOption(newOpts, "mouseoutDelay", $('#mouseout-delay').val());
                var width = parseInt($('#img_width').val(), 10);

                if ($usamap.width() != width) {
                    $('#update').prop("disabled",true);
                    $usamap.mapster('resize', width, null, 1000,function() {
                        $('#update').prop("disabled",false);
                    });
                } else {
                    $usamap.mapster('set_options', newOpts);
                }

            });

        }

        bindlinks();

        $usamap.mapster(default_options);


    });




</script>

<map id="usa_image_map" name="usa">
    <area id="karagandy" href="#" state="RI"  shape="poly" coords="790,110,793,110,796,119,79r8,128,797,128,796,132,797,132,800,136,801,136,809,140,809,139,814,139,814,138,825,137,827,143,828,143,830,151,841,152,841,149,866,146,866,145,872,143,872,142,874,142,874,141,877,140,876,134,884,130,894,133,894,135,903,138,895,151,890,152,890,154,889,154,890,156,890,161,880,163,883,169,886,169,886,170,887,170,887,173,896,177,896,181,897,181,902,187,902,188,908,187,908,188,912,189,912,196,909,197,909,198,905,198,905,199,904,201,909,203,910,207,918,210,919,212,919,217,920,217,920,223,921,223,919,229,920,229,920,231,921,231,922,235,917,235,918,239,916,240,916,243,921,244,922,246,934,249,945,244,955,259,956,259,956,260,955,260,946,262,946,263,927,264,927,263,923,262,923,261,913,260,913,259,908,259,908,260,898,260,898,261,896,261,895,263,891,264,890,266,882,264,882,263,879,263,879,262,876,261,861,268,861,270,860,270,854,277,852,277,849,281,847,281,846,283,837,300,803,301,803,302,776,302,776,303,769,303,769,304,761,304,761,305,752,305,752,306,738,306,717,307,676,308,633,309,617,310,617,309,616,309,616,306,613,305,612,303,607,303,597,304,573,302,563,302,563,301,559,300,559,299,557,299,555,296,552,295,551,292,538,291,537,289,535,289,534,287,532,287,531,285,527,284,527,283,523,282,523,281,514,280,514,279,511,279,511,278,509,278,509,277,506,277,506,276,504,276,504,275,498,275,498,274,496,274,496,273,493,273,493,272,491,272,491,271,488,271,487,269,476,265,476,264,487,257,496,255,497,253,503,251,504,249,507,249,507,248,509,248,512,244,514,244,519,237,520,237,520,236,519,236,514,234,513,231,512,231,512,230,513,230,519,226,521,219,530,218,529,213,535,212,537,204,556,208,561,207,563,208,563,207,569,205,569,202,580,202,587,193,593,192,595,185,601,180,606,179,614,170,617,170,618,168,623,166,623,160,629,157,629,155,630,155,632,146,634,146,634,145,648,144,648,145,650,145,650,146,658,146,658,147,663,148,663,149,667,150,667,151,676,153,678,156,680,156,680,157,692,158,692,159,697,163,704,161,707,157,709,157,709,156,711,155,711,153,712,153,713,151,715,151,718,147,719,147,719,145,722,143,722,141,735,141,736,146,739,147,748,147,748,146,751,146,752,144,754,144,756,141,760,140,761,138,765,137,766,135,768,135,768,134,778,128,779,128,779,122,780,122,786,120,786,119,788,119,790,117">
    <area id="ne znau" href="#" state="At"  shape="poly" coords="139,173,138,178,146,181,146,182,151,181,152,183,155,184,155,185,163,184,164,180,167,177,176,170,178,170,178,169,183,168,183,169,196,170,196,169,198,169,199,167,201,167,201,166,204,165,204,166,209,169,209,175,207,175,206,182,222,189,224,187,227,184,231,187,229,191,227,192,227,194,225,195,226,202,225,202,225,204,223,205,223,207,222,207,225,214,224,214,222,220,220,221,220,223,218,224,217,228,216,228,216,230,214,231,214,233,209,239,210,244,211,244,210,251,213,258,227,265,230,265,230,266,239,272,238,276,239,276,240,281,239,281,232,283,231,280,230,278,226,278,225,271,219,267,208,266,207,269,195,268,195,267,180,268,180,267,178,268,176,267,176,268,168,268,168,267,162,266,162,267,160,267,156,272,134,277,132,276,133,269,144,263,149,238,134,237,134,236,113,235,112,224,105,223,105,222,85,223,85,224,82,224,78,229,62,228,59,235,46,235,21,236,19,231,20,231,20,228,21,228,22,224,23,224,23,221,30,200,26,198,26,187,23,186,23,185,20,182,19,180,8,180,8,181,0,180,0,172,2,169,4,168,6,163,9,163,9,164,22,166,22,167,24,167,26,170,28,170,28,171,34,173,34,174,37,174,37,175,43,177,43,178,45,178,45,179,51,181,54,185,58,187,61,186,62,184,66,184,66,185,73,184,73,185,79,185,79,184,82,184,82,183,84,183,84,182,87,182,87,181,90,181,90,180,97,179,97,178,101,178,101,177,119,174,119,173,121,173,122,171" shape="poly">
    <area id="almaty" href="#" state="CT"  shape="poly" coords="1034,243,1034,245,1054,249,1057,254,1068,253,1073,254,1073,255,1082,255,1083,260,1090,265,1091,267,1098,267,1098,268,1105,269,1109,274,1129,275,1142,283,1146,295,1124,295,1111,295,1111,297,1108,300,1107,300,1107,301,1103,302,1103,303,1088,309,1066,312,1065,312,1065,315,1068,317,1071,322,1071,323,1085,325,1088,333,1089,333,1089,335,1090,335,1090,338,1091,338,1091,340,1092,340,1092,343,1093,343,1095,351,1104,353,1108,366,1118,369,1118,371,1124,381,1126,381,1126,382,1128,382,1128,383,1134,387,1133,387,1133,390,1132,390,1132,392,1131,392,1132,405,1131,413,1132,413,1131,417,1132,417,1137,419,1137,422,1127,417,1100,422,1100,420,1093,413,993,414,985,423,969,423,969,422,961,422,957,416,952,417,952,415,950,413,948,413,948,412,944,412,943,410,941,410,941,409,938,410,938,404,937,402,939,401,938,396,937,396,926,391,925,391,925,368,921,366,921,365,907,364,907,363,905,363,904,361,902,361,902,360,897,360,896,358,893,356,893,351,892,351,886,344,876,343,876,342,873,342,873,341,871,341,868,337,866,338,866,337,865,335,863,335,863,334,861,335,861,333,856,331,856,329,857,329,857,328,856,328,843,311,842,298,843,298,842,294,845,292,846,289,849,289,852,285,853,285,854,282,856,282,856,281,858,281,858,280,860,280,860,279,862,279,864,276,865,276,865,274,867,273,867,272,869,272,870,270,873,270,874,268,876,268,876,267,880,267,882,270,891,270,893,271,900,266,902,265,902,263,915,262,915,263,919,264,919,265,922,265,923,267,925,267,925,268,927,268,927,269,950,269,952,264,960,262,956,254,956,252,954,251,954,249,953,249,953,247,951,246,950,243,953,240,970,241,980,240,981,242,983,242,983,243,999,238,1005,242,1006,244,1008,244,1010,247,1012,247,1012,248,1016,248,1025,244,1026,242,1032,242" shape="poly">
    <area id="Zapad" href="#" state="Ak"  shape="poly"    coords="187,73,194,80,194,85,198,82,198,81,203,81,203,80,205,80,205,79,210,78,217,81,215,90,243,90,244,97,243,97,243,100,250,101,250,105,255,105,246,127,244,128,243,131,242,131,242,133,241,133,242,143,239,145,239,147,238,147,236,150,234,150,231,153,215,150,210,155,208,155,201,163,199,163,198,165,196,165,196,166,194,166,194,167,179,164,179,165,171,169,170,172,166,173,166,175,164,176,157,180,149,177,146,177,146,176,145,176,146,172,145,172,122,168,122,167,121,167,121,168,118,169,117,171,108,172,108,173,106,172,106,173,104,173,104,174,100,174,100,175,96,175,96,176,88,177,88,178,85,178,85,179,82,179,82,180,80,180,80,181,76,181,76,180,66,181,66,180,63,180,63,179,62,179,62,180,60,180,60,181,58,181,55,180,55,179,53,179,53,178,51,178,51,177,49,177,49,176,47,176,47,175,45,175,45,174,39,172,39,171,36,171,36,170,34,170,34,169,29,168,29,167,26,167,26,166,24,166,24,165,18,164,18,163,16,163,16,162,13,162,13,161,10,161,10,160,7,160,7,159,4,159,4,158,1,156,4,145,13,141,14,141,14,139,16,138,16,137,22,136,22,135,24,135,24,134,26,134,26,133,32,134,32,133,33,133,33,130,27,127,31,117,39,116,40,113,48,112,52,107,52,106,58,106,58,105,66,100,68,101,70,96,77,96,72,111,77,112,78,117,92,117,92,116,93,116,93,111,94,111,94,106,95,106,96,102,97,102,99,98,101,98,103,95,112,97,113,95,123,95,125,92,126,92,130,87,133,89,136,86,136,85,139,84,147,85,158,84,160,81,162,81,163,79,167,76,168,74,180,74,180,73" shape="poly">
    <area id="Aktobe"href="#" state="AS"  shape="poly"  coords="261,110,263,110,263,112,270,111,283,127,294,123,295,121,299,120,300,118,314,116,316,113,329,110,334,116,337,116,337,117,346,116,367,117,370,127,382,129,385,133,392,139,410,128,410,129,413,130,413,131,415,131,417,134,441,134,444,130,448,129,455,125,461,122,461,126,468,129,469,133,467,134,466,140,472,142,474,145,474,149,476,150,476,152,478,153,478,157,480,158,483,164,477,163,477,164,473,170,467,172,467,176,464,176,462,182,465,187,462,187,460,192,465,193,466,199,477,205,477,204,481,204,481,203,482,203,482,205,481,205,481,210,484,211,484,212,487,212,487,213,491,213,493,216,497,216,503,221,503,223,505,224,505,226,506,226,506,228,507,228,507,230,508,230,514,237,514,239,511,240,510,242,508,242,507,244,505,244,505,245,503,245,503,246,501,246,501,247,499,247,499,248,497,248,496,250,494,250,494,251,492,251,492,252,490,252,490,253,488,253,488,254,484,255,483,257,478,258,477,260,474,261,474,262,461,259,456,249,454,249,453,247,452,247,449,240,444,239,444,238,442,238,441,236,439,236,439,235,422,234,402,260,393,260,393,259,388,259,384,266,373,267,372,269,370,269,370,270,368,270,368,271,366,271,366,272,364,272,363,274,357,276,356,278,354,278,354,279,352,279,351,281,347,282,344,286,342,286,339,290,337,290,334,294,332,294,331,296,329,296,327,299,315,300,315,301,313,301,313,302,311,302,307,307,305,308,305,310,304,310,302,313,300,313,300,314,275,316,275,317,268,317,268,318,259,318,259,319,251,319,251,320,244,320,244,321,237,322,235,314,237,304,238,304,239,294,240,294,240,290,241,290,241,285,242,285,242,281,243,281,245,270,244,270,235,265,235,264,232,264,232,263,226,261,219,257,218,254,217,254,217,252,216,252,216,245,214,244,213,239,229,217,228,197,229,197,229,194,231,193,231,191,235,188,234,183,232,183,226,178,226,179,222,179,222,180,221,180,221,183,220,183,220,184,217,182,217,181,215,181,215,180,212,177,215,171,216,169,215,168,216,168,216,165,215,164,209,165,209,164,207,161,211,159,215,156,217,153,233,155,243,145,247,142,247,139,246,130,251,127,251,126,255,126,255,125,257,125,259,122,260,122,260,118,261,118,261,116,262,116,263,113">
    <area id="elem" state="ME"  shape="poly" coords="221,273,220,280,222,282,226,282,229,286,236,286,237,288,239,288,237,300,236,300,235,311,234,311,232,322,213,325,209,344,204,345,197,356,197,360,196,360,196,364,195,364,195,368,194,368,194,372,185,406,180,407,178,410,177,410,177,413,175,414,175,416,174,416,173,424,172,424,171,433,170,433,170,437,169,437,169,441,168,441,168,445,167,445,167,449,166,449,166,453,163,462,152,468,146,488,130,489,129,482,123,471,124,471,124,464,123,463,117,462,118,452,116,451,116,447,115,447,113,446,113,445,110,445,110,439,104,437,103,432,98,432,97,430,89,430,89,431,68,431,68,432,66,432,66,433,59,433,56,437,51,438,51,439,39,439,38,441,29,446,29,447,28,447,28,446,26,442,28,432,32,429,32,428,36,427,36,426,39,425,40,423,53,420,53,412,48,404,46,404,45,402,35,402,35,401,30,400,30,401,27,401,27,400,25,400,22,388,11,385,10,376,21,372,24,361,18,360,17,356,18,356,18,354,19,354,21,345,22,345,22,343,23,343,23,340,26,333,18,329,18,327,16,326,16,325,7,324,6,324,6,317,7,316,24,315,24,316,29,316,32,322,43,323,43,324,45,324,45,325,49,323,56,323,58,317,52,316,48,311,46,311,46,310,44,309,44,305,48,302,48,301,53,300,54,301,54,300,55,300,58,293,66,291,67,289,69,289,69,288,82,288,86,295,107,296,108,301,114,302,114,301,119,301,119,302,124,302,125,299,126,299,126,296,117,294,120,283,122,283,122,282,124,282,124,281,131,282,131,281,134,282,147,281,162,269,174,271,194,270,207,272,207,271,215,271,216,273">
    <area id="kyz" href="#" state="KYZ" shape="poly" coords="447,251,451,251,456,257,457,257,456,261,457,261,465,263,465,264,466,266,462,267,463,269,480,269,482,273,493,277,493,278,496,278,496,279,498,279,498,280,502,279,502,280,506,281,506,282,509,282,509,283,511,283,511,284,521,285,521,286,523,286,524,288,528,289,529,291,533,292,534,294,538,295,538,296,539,296,539,295,541,296,547,296,549,299,551,299,553,302,557,303,557,304,563,306,563,307,569,306,569,307,578,307,578,308,610,308,613,317,619,320,617,322,617,329,615,341,616,341,622,345,624,348,626,348,628,382,646,397,647,397,647,403,645,404,644,408,642,409,642,411,641,411,640,421,638,422,638,424,637,424,639,433,638,434,627,436,625,439,622,439,622,440,620,440,619,442,615,443,613,446,609,447,609,448,607,448,606,450,600,452,599,454,595,455,594,457,592,457,590,460,588,460,587,462,583,462,583,463,578,464,578,463,575,455,574,431,559,429,556,421,556,416,555,416,542,415,540,412,540,408,539,408,539,406,534,401,534,400,525,400,522,402,518,407,491,408,478,407,462,400,462,401,457,402,455,405,453,405,452,407,441,408,422,410,415,402,413,401,413,399,401,389,395,382,393,382,391,377,388,375,388,372,385,371,382,367,380,367,379,365,377,365,375,362,373,362,371,359,367,358,367,357,365,356,365,352,364,352,356,349,352,343,352,341,349,340,347,337,343,336,340,332,332,332,330,329,323,324,323,322,320,321,319,319,315,319,315,318,313,318,312,316,310,316,310,315,308,311,311,305,318,302,329,302,331,298,333,298,339,294,341,291,343,291,349,284,351,284,351,283,353,283,354,281,360,279,361,277,364,276,364,275,372,273,374,269,387,270,403,262,403,263,406,263,407,260,408,260,408,258,409,258,409,256,411,255,411,253,414,251,414,249,416,248,416,246,419,244,419,242,421,241,422,238,437,238,437,239,440,239,442,242,444,242,444,243,446,246,447,246">
    <area id="Kostanay"href="#" state="KOZ" shape="poly" coords="579,18,579,36,576,53,577,53,577,56,579,57,579,62,580,62,583,69,581,72,579,72,578,75,577,75,577,80,576,80,576,82,575,82,575,85,574,85,576,95,575,95,563,106,563,107,561,108,561,110,560,110,557,114,559,123,560,123,561,138,561,139,565,139,565,138,568,138,568,137,572,140,578,141,580,144,582,144,582,145,586,146,586,147,594,147,594,148,596,148,596,149,604,149,606,154,607,154,609,157,611,157,611,158,613,158,615,161,618,161,619,167,615,168,615,169,608,169,603,176,600,176,589,189,585,189,576,199,565,199,564,203,560,202,560,203,557,204,557,203,550,203,550,202,533,200,530,209,525,208,525,209,524,209,524,216,515,217,516,222,515,222,510,225,510,223,503,217,502,214,496,214,496,213,494,213,494,212,486,206,487,206,487,201,480,200,480,201,477,201,477,202,476,201,467,188,469,187,468,184,467,184,467,180,473,178,472,174,475,174,477,172,477,170,478,170,482,168,482,169,485,169,487,163,485,158,484,158,484,156,483,156,483,154,480,152,480,150,478,149,470,125,464,122,463,120,455,120,453,109,448,108,448,107,438,107,436,104,425,102,425,101,422,101,422,100,418,98,418,91,421,90,438,90,441,87,441,86,447,85,447,84,441,74,446,70,446,69,455,66,455,65,467,66,467,65,470,65,470,64,476,64,476,65,482,64,482,63,460,61,457,57,458,39,463,35,485,35,502,36,502,35,510,35,518,28,548,29,559,32,564,25,568,25,569,22">
    <area id="Astana"href="#" state="NA" shape="poly" coords="672,55,678,60,679,62,690,64,700,59,713,62,716,67,718,67,720,70,728,71,728,72,739,72,739,71,743,70,743,69,744,70,750,75,759,76,779,80,782,85,783,85,783,87,784,87,785,115,776,118,774,127,771,128,771,129,766,130,765,132,763,132,763,133,759,134,758,136,756,136,755,138,740,144,738,138,735,136,722,137,716,144,715,144,713,147,707,153,697,158,694,155,682,153,682,152,680,152,679,150,677,150,676,148,669,147,669,146,665,145,665,144,660,143,660,142,652,142,652,141,650,141,650,140,640,139,630,142,625,155,621,156,621,157,614,153,610,152,607,145,595,144,595,143,588,143,588,142,582,140,581,138,574,136,571,133,571,132,565,134,565,124,564,124,562,114,577,101,584,95,584,96,591,96,591,97,595,98,595,99,607,98,610,96,611,96,611,94,614,92,625,96,631,88,636,87,642,82,642,80,646,77,646,69,642,60,643,59,653,58,653,57,663,58,663,57" shape="poly">
    <area id="Sever"href="#" state="VT" shape="poly" coords="691,2,693,17,696,17,698,26,696,27,696,29,705,36,711,34,712,32,714,32,714,31,741,31,741,32,747,33,747,34,751,35,751,36,757,36,757,37,758,37,761,63,766,65,771,74,766,74,757,72,757,71,752,71,752,70,750,70,747,66,745,66,745,65,730,68,730,67,723,67,723,66,718,63,718,61,711,57,711,58,703,57,702,55,698,55,690,55,688,60,684,60,684,59,682,59,680,56,678,56,677,54,676,54,675,51,667,51,647,53,647,54,644,54,644,55,642,55,642,56,640,56,637,63,638,63,638,65,639,65,639,68,641,69,642,75,638,78,638,80,636,81,636,82,631,83,631,84,624,91,619,90,618,88,610,89,607,94,595,94,595,93,592,93,592,92,586,92,586,91,579,90,579,83,581,82,581,80,582,80,582,76,586,74,586,72,587,72,586,62,583,60,584,55,583,55,583,52,582,52,582,50,581,50,582,40,584,40,585,36,586,36,585,34,585,28,586,28,585,19,598,19,598,18,600,18,600,17,620,17,620,16,624,15,625,12,633,13,633,9,637,7,638,7,638,4,641,2,641,1,657,1,669,2,669,3,671,3,671,4,680,7,689,1" shape="poly">
    <area id="Yug" href="#" state="NY" shape="poly" coords="728,428,728,430,735,433,736,436,738,436,738,437,740,437,742,440,743,440,743,443,744,443,744,446,745,446,745,449,746,449,746,451,747,451,747,453,752,455,752,456,755,456,755,457,764,461,765,464,763,464,763,465,759,464,757,475,749,478,748,481,743,481,741,482,741,489,738,490,725,491,720,501,714,508,709,507,708,509,696,509,694,523,687,530,686,533,682,532,676,549,675,549,675,553,674,553,674,554,666,554,666,555,665,555,665,550,663,530,659,530,658,526,647,525,647,526,644,526,643,527,643,526,637,527,603,527,603,528,596,528,595,514,594,503,593,483,592,482,576,480,574,475,576,475,579,470,584,469,584,468,586,468,587,466,591,465,592,463,596,462,597,460,599,460,601,457,603,457,604,455,606,455,608,452,610,452,611,450,613,450,613,449,615,449,615,448,618,448,618,447,621,447,621,446,624,446,627,442,631,441,631,440,643,438,645,427,643,417,646,415,646,410,652,409,653,403,649,398,654,391,651,390,651,389,648,389,647,387,645,387,645,386,643,386,640,381,631,379,631,344,623,343,619,336,621,326,622,326,625,319,619,316,620,313,637,313,679,312,681,315,683,315,687,320,689,321,689,324,690,324,690,327,691,327,691,329,692,329,692,331,699,336,701,342,702,342,702,344,703,344,703,346,704,346,706,352,707,352,707,355,708,355,708,357,709,357,711,369,715,372,716,387,715,387,715,389,714,389,714,398,713,398,713,401,712,401,712,411,711,411,711,413,707,419,712,423,712,424,720,425,721,427,723,427,723,428" shape="poly">
    <area id="Pavlodar" href="#" state="Pa" shape="poly" coords="831,28,843,32,843,33,845,33,845,34,848,34,848,35,850,35,850,36,871,43,873,46,875,46,876,48,878,48,880,51,882,51,883,53,885,53,887,56,889,56,889,57,892,58,893,60,895,60,897,63,899,63,901,66,903,66,906,70,908,70,909,72,911,72,915,77,917,77,920,81,925,81,925,82,928,89,927,91,922,92,922,93,918,96,916,99,916,100,914,100,914,101,911,101,908,106,903,105,903,114,904,116,910,118,911,120,918,121,920,121,921,126,927,132,931,133,931,136,927,138,927,140,925,138,920,138,920,139,904,138,902,133,896,128,894,128,894,127,884,128,875,126,875,127,872,138,865,140,865,141,861,141,861,142,859,142,859,143,855,143,855,144,833,143,831,140,829,140,828,137,825,136,825,135,815,133,812,134,801,133,800,111,793,105,789,105,790,94,789,94,789,89,786,81,781,79,780,75,770,63,769,63,769,61,766,59,766,57,763,48,764,46,768,44,768,43,774,44,774,45,784,46,784,45,786,41,788,40,788,39,792,38,793,36,795,36,797,33,799,33,800,31,804,30,806,27,807,27,807,25,810,23,829,23,914,118,916,118,916,119" shape="poly">
    <area id="Zhambyl" href="#" state="Zham"  shape="poly" coords="835,302,838,318,845,323,846,325,849,326,849,332,851,333,852,335,854,335,854,336,856,336,856,337,858,337,858,338,860,338,861,340,865,341,866,343,871,344,871,345,875,345,875,346,878,346,878,347,884,348,884,349,890,363,895,364,895,365,900,365,900,366,905,365,905,366,920,371,921,390,920,390,919,397,920,397,920,398,928,398,928,399,934,401,934,409,936,410,937,414,947,416,952,424,944,425,944,424,940,424,934,424,934,423,927,423,927,422,914,421,910,416,903,415,903,414,901,414,901,413,878,415,878,418,865,431,868,446,828,445,826,439,822,438,822,439,812,439,801,436,801,437,797,438,797,439,786,438,783,441,783,445,781,446,781,448,779,449,764,457,761,455,761,453,760,453,759,451,757,451,755,448,753,448,752,446,749,445,748,441,747,441,746,438,744,437,744,435,742,434,742,432,741,432,736,429,736,430,735,430,735,429,734,429,734,425,732,425,731,423,726,424,724,421,716,421,716,419,713,419,713,418,717,405,719,392,723,389,722,379,721,379,721,372,720,372,720,369,719,369,714,366,710,350,708,350,705,340,703,339,703,337,702,337,701,333,699,332,699,330,696,328,696,326,694,325,693,318,692,318,686,312,696,312,696,311,699,312,699,311,712,311,712,310,723,310,723,309,756,308,756,307,769,307,769,306,773,306,783,306,783,305,798,304,809,304" shape="poly">
    <area id="Vostok" href="#" state="Vos"  shape="poly" coords="952,102,952,104,959,113,960,113,960,112,969,100,968,98,969,98,971,97,971,94,976,95,976,96,987,96,987,97,990,97,990,98,992,98,996,103,1002,103,1002,104,1005,104,1005,105,1011,104,1020,105,1020,104,1026,103,1026,101,1029,99,1029,97,1030,97,1032,94,1034,94,1037,90,1045,89,1045,90,1051,90,1052,92,1054,92,1054,93,1058,94,1058,95,1066,95,1066,96,1068,96,1068,97,1072,97,1072,98,1074,98,1075,100,1078,101,1081,111,1086,111,1086,110,1101,111,1101,112,1105,112,1105,113,1109,114,1110,116,1112,116,1114,119,1120,121,1120,122,1135,122,1145,122,1147,119,1159,115,1171,124,1172,124,1175,134,1176,134,1176,136,1177,136,1177,139,1178,139,1182,150,1180,152,1178,152,1175,156,1161,158,1169,182,1179,185,1182,193,1183,193,1184,198,1185,198,1186,204,1175,214,1174,216,1160,216,1146,217,1135,216,1135,217,1129,217,1129,216,1125,215,1125,214,1122,214,1122,213,1118,212,1118,214,1119,214,1120,220,1121,220,1121,223,1122,223,1122,226,1123,226,1125,233,1118,236,1124,257,1125,257,1126,261,1127,261,1127,267,1128,267,1129,272,1115,267,1115,268,1117,270,1115,270,1109,262,1107,261,1107,259,1100,253,1099,251,1093,249,1093,248,1091,248,1091,247,1081,247,1080,245,1072,245,1072,246,1064,245,1064,246,1048,245,1048,244,1046,244,1046,243,1041,243,1041,242,1038,242,1037,240,1026,239,1026,240,1024,240,1023,242,1014,244,1014,243,1011,243,1010,241,1008,241,1007,239,1005,239,1005,238,998,235,998,236,995,236,995,237,993,237,993,238,984,239,984,238,977,238,977,237,973,237,973,236,970,236,970,235,967,236,951,236,951,237,947,237,947,238,945,238,945,239,943,239,942,241,936,242,933,246,922,245,922,244,921,244,920,239,921,239,927,232,926,232,925,227,924,227,924,225,922,224,925,212,922,208,920,208,919,206,913,204,911,201,913,195,914,195,917,190,903,183,899,178,898,178,897,175,895,175,895,174,888,166,889,166,888,162,892,162,905,147,907,140,916,140,916,141,923,141,923,140,933,141,936,135,931,130,931,128,928,126,928,125,926,125,925,123,921,122,921,121,917,120,917,119,914,119,912,116,908,113,907,113,908,108,914,105,919,99,922,98,922,96,924,95,924,94,929,93,928,91,932,89,932,90,937,91,940,96,944,97,944,98,948,99,948,100" shape="poly">
</map>


<div class="pictures">

</div>
<div class="a"></div>

<script>
    elem.onclick = function() {
        alert("Aktau")
        location.href = "aktau2.php";
    }

    karagandy.onclick= function(){
      alert("Karagandy")
      location.href = "karagandy.php";
    }

    almaty.onclick= function(){
      alert("Almaty")
      location.href = "almaty.php";
    }
</script>
</body>
</html>