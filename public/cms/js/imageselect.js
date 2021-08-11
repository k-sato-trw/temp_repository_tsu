/*
 * ImageSelect jQuery Plugin
 * Version 1.2
 *
 * lgalvin
 * http://www.liam-galvin.co.uk/imageselect
 *
 */


(function( $ ){

	var methods = {
		init: function(options){
			if(!/select/i.test(this.tagName)){return false;}

			var element = $(this);

			var selectName = element.attr('name');
			var id = 'jq_imageselect_' + selectName;

			if($('#'+id).length > 0){
				//already exists
				return;
			}

			var iWidth= options.width > options.dropdownWidth ? options.width : options.dropdownWidth;

			var imageSelect = $(document.createElement('div')).attr('id',id).addClass('jqis');

			imageSelect.css('width',iWidth+'px').css('height',options.height+'px');

			var header = $(document.createElement('div')).addClass('jqis_header');
			header.css('width',options.width+'px').css('height',options.height +'px');
			header.css('text-align','center').css('background-color',options.backgroundColor);
			header.css('border','1px solid ' + options.borderColor);

			var dropdown = $(document.createElement('div')).addClass('jqis_dropdown');

			dropdown.css('width',options.dropdownWidth+'px');//.css('height',options.dropdownHeight +'px');
			dropdown.css('z-index',options.z).css('background-color',options.backgroundColor).css('border','1px solid ' + options.borderColor);;
			dropdown.hide();

			var selectedImage = $('option:selected',element).text();

			header.attr('lock',options.lock);
			if(options.lock == 'height'){
				header.append('<img style="height:' + options.height + 'px" />');
			}else{
				header.append('<img style="width:' + (options.width-75) + 'px" />');
			}
			

			var $options = $('option',element);

			$options.each(function(i,el){
					//dropdown.append('<img style="width:' + options.dropdownWidth + 'px" onclick="jQuery(\'select[name=' + selectName + ']\').val(\''+ $(el).val() + '\').ImageSelect(\'close\').ImageSelect(\'update\',{src:\''+ $(el).text() + '\'});" src="' + $(el).text() + '"/>');
					dropdown.append('<img style="width:100%" onclick="jQuery(\'select[name=' + selectName + ']\').val(\''+ $(el).val() + '\').ImageSelect(\'close\').ImageSelect(\'update\',{src:\''+ $(el).text() + '\'});" src="' + $(el).text() + '"/>');
			});


			imageSelect.append(header);
			imageSelect.append(dropdown);

			



			element.after(imageSelect);
			element.hide();


			header.attr('linkedselect',selectName);
			header.children().attr('linkedselect',selectName);
			header.click(function(){$('select[name=' + $(this).attr('linkedselect') + ']').ImageSelect('open');});
			//header.children().click(function(){$('select[name=' + $(this).attr('linkedselect') + ']').ImageSelect('open');});

			var w = 0;

			$('.jqis_dropdown img').mouseover(function(){
				$(this).css('opacity',1);
			}).mouseout(function(){
				$(this).css('opacity',0.3);
			}).css('opacity',0.3).each(function(i,el){
				w = w+$(el).width();
			});

			dropdown.css('max-height',options.dropdownHeight + 'px');
				
			/*
			if(w < options.dropdownWidth){
				dropdown.css('height',options.height + 'px');
			}else{
				 var mod = (w % options.dropdownWidth);
				 var rows = ((w - mod)/options.dropdownWidth) + 1;
				 var h = (options.height * rows);
				 if(h > options.dropdownHeight){
					dropdown.css('height',options.dropdownHeight + 'px');
					
				 }else{
					dropdown.css('height',h + 'px'); 
				 }
			}*/

			element.ImageSelect('update',{src:selectedImage});

		},
		
		update:function(options){

			var element = $(this);

			var selectName = element.attr('name');

			var id = 'jq_imageselect_' + selectName;

			if($('#'+id + ' .jqis_header').length == 1){

					var ffix = false;

				 if($('#'+id + ' .jqis_header img').attr('src') != options.src){
					 ffix = true; //run fix for firefox
				 }

				 $('#'+id + ' .jqis_header img').attr('src',options.src).css('opacity',0.1);

				 if(ffix){
					 setTimeout(function(){element.ImageSelect('update',options);},1);
					 return;
				 }

				 if($('#'+id + ' .jqis_header').attr('lock') == 'height'){

					$('#'+id + ' .jqis_header img').unbind('load');

					$('#'+id + ' .jqis_header img').one('load',function(){

						$(this).parent().stop();
						//$('.jqis_dropdown',$(this).parent().parent()).stop();
						$(this).parent().parent().stop();
						$(this).parent().animate({width:$(this).width() + 60});
						$(this).parent().parent().animate({width:$(this).width() + 60});
						$('.jqis_dropdown',$(this).parent().parent()).animate({width:$(this).width() + 50});

					}).each(function() {
					if(this.complete) $(this).load();
					});
				 }else{
					$('#'+id + ' .jqis_header img').unbind('load');
					$('#'+id + ' .jqis_header img').one('load', function() {
						$(this).parent().parent().stop();
						$(this).parent().stop();
						$(this).parent().parent().css('height',($(this).height()+2) + 'px');
						$(this).parent().animate({height:$(this).height()+2});
					}).each(function() {
					if(this.complete) $(this).load();
					});
					
				 }

				 $('#'+id + ' .jqis_header img').animate({opacity:1});


			}

		},
		open: function(){

			var element = $(this);

			var selectName = element.attr('name');

			if( selectName == 'FAVOLITE_MARK11' ){

				 $("#FAVOLITE_MARK12").ImageSelect('close')
				 $("#FAVOLITE_MARK21").ImageSelect('close')
				 $("#FAVOLITE_MARK22").ImageSelect('close')
				 $("#RICH_MARK11").ImageSelect('close')
				 $("#RICH_MARK12").ImageSelect('close')
				 $("#RICH_MARK21").ImageSelect('close')
				 $("#RICH_MARK22").ImageSelect('close')

			}

			if( selectName == 'FAVOLITE_MARK12' ){

				 $("#FAVOLITE_MARK11").ImageSelect('close')
				 $("#FAVOLITE_MARK21").ImageSelect('close')
				 $("#FAVOLITE_MARK22").ImageSelect('close')
				 $("#RICH_MARK11").ImageSelect('close')
				 $("#RICH_MARK12").ImageSelect('close')
				 $("#RICH_MARK21").ImageSelect('close')
				 $("#RICH_MARK22").ImageSelect('close')

			}

			if( selectName == 'FAVOLITE_MARK21' ){

				 $("#FAVOLITE_MARK11").ImageSelect('close')
				 $("#FAVOLITE_MARK12").ImageSelect('close')
				 $("#FAVOLITE_MARK22").ImageSelect('close')
				 $("#RICH_MARK11").ImageSelect('close')
				 $("#RICH_MARK12").ImageSelect('close')
				 $("#RICH_MARK21").ImageSelect('close')
				 $("#RICH_MARK22").ImageSelect('close')

			}

			if( selectName == 'FAVOLITE_MARK22' ){

				 $("#FAVOLITE_MARK11").ImageSelect('close')
				 $("#FAVOLITE_MARK12").ImageSelect('close')
				 $("#FAVOLITE_MARK21").ImageSelect('close')
				 $("#RICH_MARK11").ImageSelect('close')
				 $("#RICH_MARK12").ImageSelect('close')
				 $("#RICH_MARK21").ImageSelect('close')
				 $("#RICH_MARK22").ImageSelect('close')

			}

			if( selectName == 'RICH_MARK11' ){

				 $("#FAVOLITE_MARK11").ImageSelect('close')
				 $("#FAVOLITE_MARK12").ImageSelect('close')
				 $("#FAVOLITE_MARK21").ImageSelect('close')
				 $("#FAVOLITE_MARK22").ImageSelect('close')
				 $("#RICH_MARK12").ImageSelect('close')
				 $("#RICH_MARK21").ImageSelect('close')
				 $("#RICH_MARK22").ImageSelect('close')

			}

			if( selectName == 'RICH_MARK12' ){

				 $("#FAVOLITE_MARK11").ImageSelect('close')
				 $("#FAVOLITE_MARK12").ImageSelect('close')
				 $("#FAVOLITE_MARK21").ImageSelect('close')
				 $("#FAVOLITE_MARK22").ImageSelect('close')
				 $("#RICH_MARK11").ImageSelect('close')
				 $("#RICH_MARK21").ImageSelect('close')
				 $("#RICH_MARK22").ImageSelect('close')

			}

			if( selectName == 'RICH_MARK21' ){

				 $("#FAVOLITE_MARK11").ImageSelect('close')
				 $("#FAVOLITE_MARK12").ImageSelect('close')
				 $("#FAVOLITE_MARK21").ImageSelect('close')
				 $("#FAVOLITE_MARK22").ImageSelect('close')
				 $("#RICH_MARK11").ImageSelect('close')
				 $("#RICH_MARK12").ImageSelect('close')
				 $("#RICH_MARK22").ImageSelect('close')

			}
			if( selectName == 'RICH_MARK21' ){

				 $("#FAVOLITE_MARK11").ImageSelect('close')
				 $("#FAVOLITE_MARK12").ImageSelect('close')
				 $("#FAVOLITE_MARK21").ImageSelect('close')
				 $("#FAVOLITE_MARK22").ImageSelect('close')
				 $("#RICH_MARK11").ImageSelect('close')
				 $("#RICH_MARK12").ImageSelect('close')
				 $("#RICH_MARK22").ImageSelect('close')

			}

			if( selectName == 'RICH_MARK22' ){

				 $("#FAVOLITE_MARK11").ImageSelect('close')
				 $("#FAVOLITE_MARK12").ImageSelect('close')
				 $("#FAVOLITE_MARK21").ImageSelect('close')
				 $("#FAVOLITE_MARK22").ImageSelect('close')
				 $("#RICH_MARK11").ImageSelect('close')
				 $("#RICH_MARK12").ImageSelect('close')
				 $("#RICH_MARK21").ImageSelect('close')

			}

			var id = 'jq_imageselect_' + selectName;

			var w = 0;

			if($('#'+id).length == 1){

				if($('#'+id + ' .jqis_dropdown').is(':visible')){
					$('#'+id + ' .jqis_dropdown').stop();
					$('#'+id + ' .jqis_dropdown').slideUp().fadeOut();
				}else{
					$('#'+id + ' .jqis_dropdown').stop();
					var mh = $('#'+id + ' .jqis_dropdown').css('max-height').replace(/px/,'');
					mh = parseInt(mh);

					window.imageHeightTotal = 0;

					$('#'+id + ' .jqis_dropdown').show();

					$('#'+id + ' .jqis_dropdown img').each(function(i,el){
					 window.imageHeightTotal = window.imageHeightTotal + $(el).height();
					});

					var ih = window.imageHeightTotal;

					mh = (ih < mh && ih > 0) ? ih : mh;

					$('#'+id + ' .jqis_dropdown').height(mh);
				}
				
			}
		},
		close:function(){

			var element = $(this);

			var selectName = element.attr('name');

			// 20151020 s-yoshikawa 選択時プログラム実行追加
			var selectId = element.attr('id');

			if( selectId == 'FAVOLITE_MARK11' ){
			// 本命前記号のとき

				 if( document.form.FAVOLITE_MARK11.value == '8' ){

					document.form.FAVOLITE111.disabled = true;
					document.form.FAVOLITE112.disabled = false;
					document.form.FAVOLITE113.disabled = true;

					document.form.FAVOLITE122.disabled = false;
					document.form.FAVOLITE123.disabled = true;

					document.form.FAVOLITE132.disabled = false;
					document.form.FAVOLITE133.disabled = true;

					document.form.FAVOLITE111.value = '';
					document.form.FAVOLITE113.value = '';

					document.form.FAVOLITE123.value = '';

					document.form.FAVOLITE133.value = '';

					document.getElementById( 'FAVOLITE111' ).className = 'fm_f-waku2';
					document.getElementById( 'FAVOLITE112' ).className = 'fm_f-waku';
					document.getElementById( 'FAVOLITE113' ).className = 'fm_f-waku2';

					document.getElementById( 'FAVOLITE122' ).className = 'fm_f-waku';
					document.getElementById( 'FAVOLITE123' ).className = 'fm_f-waku2';

					document.getElementById( 'FAVOLITE132' ).className = 'fm_f-waku';
					document.getElementById( 'FAVOLITE133' ).className = 'fm_f-waku2';

					document.getElementById( 'TD_FAVOLITE111' ).className = 'kumi2';
					document.getElementById( 'TD_FAVOLITE112' ).className = 'kumi';
					document.getElementById( 'TD_FAVOLITE113' ).className = 'kumi2';

					document.getElementById( 'TD_FAVOLITE122' ).className = 'kumi';
					document.getElementById( 'TD_FAVOLITE123' ).className = 'kumi2';

					document.getElementById( 'TD_FAVOLITE132' ).className = 'kumi';
					document.getElementById( 'TD_FAVOLITE133' ).className = 'kumi2';

				 }else if( document.form.FAVOLITE_MARK11.value == '9' ){

					document.form.FAVOLITE111.disabled = false;
					document.getElementById( 'FAVOLITE111' ).className = 'fm_f-waku';
					document.getElementById( 'TD_FAVOLITE111' ).className = 'kumi';

					document.form.FAVOLITE111.disabled = false;
					document.form.FAVOLITE112.disabled = true;
					document.form.FAVOLITE122.disabled = true;
					document.form.FAVOLITE132.disabled = true;
					document.form.FAVOLITE112.value = '';
					document.form.FAVOLITE122.value = '';
					document.form.FAVOLITE132.value = '';
					document.getElementById( 'FAVOLITE112' ).className = 'fm_f-waku2';
					document.getElementById( 'FAVOLITE122' ).className = 'fm_f-waku2';
					document.getElementById( 'FAVOLITE132' ).className = 'fm_f-waku2';
					document.getElementById( 'TD_FAVOLITE112' ).className = 'kumi2';
					document.getElementById( 'TD_FAVOLITE122' ).className = 'kumi2';
					document.getElementById( 'TD_FAVOLITE132' ).className = 'kumi2';

					if( document.form.FAVOLITE_MARK12.value !== '9' ){

						 document.form.FAVOLITE113.disabled = false;
						 document.form.FAVOLITE123.disabled = false;
						 document.form.FAVOLITE133.disabled = false;
						 document.getElementById( 'FAVOLITE113' ).className = 'fm_f-waku';
						 document.getElementById( 'FAVOLITE123' ).className = 'fm_f-waku';
						 document.getElementById( 'FAVOLITE133' ).className = 'fm_f-waku';
						 document.getElementById( 'TD_FAVOLITE113' ).className = 'kumi';
						 document.getElementById( 'TD_FAVOLITE123' ).className = 'kumi';
						 document.getElementById( 'TD_FAVOLITE133' ).className = 'kumi';

					}else{

						 document.form.FAVOLITE113.disabled = true;
						 document.form.FAVOLITE123.disabled = true;
						 document.form.FAVOLITE133.disabled = true;
						 document.form.FAVOLITE113.value = '';
						 document.form.FAVOLITE123.value = '';
						 document.form.FAVOLITE133.value = '';
						 document.getElementById( 'FAVOLITE113' ).className = 'fm_f-waku2';
						 document.getElementById( 'FAVOLITE123' ).className = 'fm_f-waku2';
						 document.getElementById( 'FAVOLITE133' ).className = 'fm_f-waku2';
						 document.getElementById( 'TD_FAVOLITE113' ).className = 'kumi2';
						 document.getElementById( 'TD_FAVOLITE123' ).className = 'kumi2';
						 document.getElementById( 'TD_FAVOLITE133' ).className = 'kumi2';


						}

				 }else{

					document.form.FAVOLITE111.disabled = false;
					document.getElementById( 'FAVOLITE111' ).className = 'fm_f-waku';
					document.getElementById( 'TD_FAVOLITE111' ).className = 'kumi';

					document.form.FAVOLITE112.disabled = false;
					document.form.FAVOLITE122.disabled = false;
					document.form.FAVOLITE132.disabled = false;
					document.getElementById( 'FAVOLITE112' ).className = 'fm_f-waku';
					document.getElementById( 'FAVOLITE122' ).className = 'fm_f-waku';
					document.getElementById( 'FAVOLITE132' ).className = 'fm_f-waku';
					document.getElementById( 'TD_FAVOLITE112' ).className = 'kumi';
					document.getElementById( 'TD_FAVOLITE122' ).className = 'kumi';
					document.getElementById( 'TD_FAVOLITE132' ).className = 'kumi';

					if( document.form.FAVOLITE_MARK12.value !== '9' ){

						 document.form.FAVOLITE113.disabled = false;
						 document.form.FAVOLITE123.disabled = false;
						 document.form.FAVOLITE133.disabled = false;
						 document.getElementById( 'FAVOLITE113' ).className = 'fm_f-waku';
						 document.getElementById( 'FAVOLITE123' ).className = 'fm_f-waku';
						 document.getElementById( 'FAVOLITE133' ).className = 'fm_f-waku';
						 document.getElementById( 'TD_FAVOLITE113' ).className = 'kumi';
						 document.getElementById( 'TD_FAVOLITE123' ).className = 'kumi';
						 document.getElementById( 'TD_FAVOLITE133' ).className = 'kumi';

					}else{

						 document.form.FAVOLITE113.disabled = true;
						 document.form.FAVOLITE123.disabled = true;
						 document.form.FAVOLITE133.disabled = true;
						 document.form.FAVOLITE113.value = '';
						 document.form.FAVOLITE123.value = '';
						 document.form.FAVOLITE133.value = '';
						 document.getElementById( 'FAVOLITE113' ).className = 'fm_f-waku2';
						 document.getElementById( 'FAVOLITE123' ).className = 'fm_f-waku2';
						 document.getElementById( 'FAVOLITE133' ).className = 'fm_f-waku2';
						 document.getElementById( 'TD_FAVOLITE113' ).className = 'kumi2';
						 document.getElementById( 'TD_FAVOLITE123' ).className = 'kumi2';
						 document.getElementById( 'TD_FAVOLITE133' ).className = 'kumi2';


					}
				 }
			}else if( selectId == 'FAVOLITE_MARK12' ){

				 if( document.form.FAVOLITE_MARK11.value == '8' ){

					document.form.FAVOLITE111.disabled = true;
					document.form.FAVOLITE112.disabled = false;
					document.form.FAVOLITE113.disabled = true;

					document.form.FAVOLITE122.disabled = false;
					document.form.FAVOLITE123.disabled = true;

					document.form.FAVOLITE132.disabled = false;
					document.form.FAVOLITE133.disabled = true;

					document.form.FAVOLITE111.value = '';
					document.form.FAVOLITE113.value = '';

					document.form.FAVOLITE123.value = '';

					document.form.FAVOLITE133.value = '';

					document.getElementById( 'FAVOLITE111' ).className = 'fm_f-waku2';
					document.getElementById( 'FAVOLITE112' ).className = 'fm_f-waku';
					document.getElementById( 'FAVOLITE113' ).className = 'fm_f-waku2';

					document.getElementById( 'FAVOLITE122' ).className = 'fm_f-waku';
					document.getElementById( 'FAVOLITE123' ).className = 'fm_f-waku2';

					document.getElementById( 'FAVOLITE132' ).className = 'fm_f-waku';
					document.getElementById( 'FAVOLITE133' ).className = 'fm_f-waku2';

					document.getElementById( 'TD_FAVOLITE111' ).className = 'kumi2';
					document.getElementById( 'TD_FAVOLITE112' ).className = 'kumi';
					document.getElementById( 'TD_FAVOLITE113' ).className = 'kumi2';

					document.getElementById( 'TD_FAVOLITE122' ).className = 'kumi';
					document.getElementById( 'TD_FAVOLITE123' ).className = 'kumi2';

					document.getElementById( 'TD_FAVOLITE132' ).className = 'kumi';
					document.getElementById( 'TD_FAVOLITE133' ).className = 'kumi2';


				 }else if( document.form.FAVOLITE_MARK11.value == '9' ){

					document.form.FAVOLITE111.disabled = false;
					document.getElementById( 'FAVOLITE111' ).className = 'fm_f-waku';
					document.getElementById( 'TD_FAVOLITE111' ).className = 'kumi';

					document.form.FAVOLITE112.disabled = true;
					document.form.FAVOLITE122.disabled = true;
					document.form.FAVOLITE132.disabled = true;
					document.form.FAVOLITE112.value = '';
					document.form.FAVOLITE122.value = '';
					document.form.FAVOLITE132.value = '';
					document.getElementById( 'FAVOLITE112' ).className = 'fm_f-waku2';
					document.getElementById( 'FAVOLITE122' ).className = 'fm_f-waku2';
					document.getElementById( 'FAVOLITE132' ).className = 'fm_f-waku2';
					document.getElementById( 'TD_FAVOLITE112' ).className = 'kumi2';
					document.getElementById( 'TD_FAVOLITE122' ).className = 'kumi2';
					document.getElementById( 'TD_FAVOLITE132' ).className = 'kumi2';

					if( document.form.FAVOLITE_MARK12.value !== '9' ){

						 document.form.FAVOLITE113.disabled = false;
						 document.form.FAVOLITE123.disabled = false;
						 document.form.FAVOLITE133.disabled = false;
						 document.getElementById( 'FAVOLITE113' ).className = 'fm_f-waku';
						 document.getElementById( 'FAVOLITE123' ).className = 'fm_f-waku';
						 document.getElementById( 'FAVOLITE133' ).className = 'fm_f-waku';
						 document.getElementById( 'TD_FAVOLITE113' ).className = 'kumi';
						 document.getElementById( 'TD_FAVOLITE123' ).className = 'kumi';
						 document.getElementById( 'TD_FAVOLITE133' ).className = 'kumi';

					}else{

						 document.form.FAVOLITE113.disabled = true;
						 document.form.FAVOLITE123.disabled = true;
						 document.form.FAVOLITE133.disabled = true;
						 document.form.FAVOLITE113.value = '';
						 document.form.FAVOLITE123.value = '';
						 document.form.FAVOLITE133.value = '';
						 document.getElementById( 'FAVOLITE113' ).className = 'fm_f-waku2';
						 document.getElementById( 'FAVOLITE123' ).className = 'fm_f-waku2';
						 document.getElementById( 'FAVOLITE133' ).className = 'fm_f-waku2';
						 document.getElementById( 'TD_FAVOLITE113' ).className = 'kumi2';
						 document.getElementById( 'TD_FAVOLITE123' ).className = 'kumi2';
						 document.getElementById( 'TD_FAVOLITE133' ).className = 'kumi2';

					}

				 }else{


					document.form.FAVOLITE111.disabled = false;
					document.getElementById( 'FAVOLITE111' ).className = 'fm_f-waku';
					document.getElementById( 'TD_FAVOLITE111' ).className = 'kumi';


					document.form.FAVOLITE112.disabled = false;
					document.form.FAVOLITE122.disabled = false;
					document.form.FAVOLITE132.disabled = false;
					document.getElementById( 'FAVOLITE112' ).className = 'fm_f-waku';
					document.getElementById( 'FAVOLITE122' ).className = 'fm_f-waku';
					document.getElementById( 'FAVOLITE132' ).className = 'fm_f-waku';
					document.getElementById( 'TD_FAVOLITE112' ).className = 'kumi';
					document.getElementById( 'TD_FAVOLITE122' ).className = 'kumi';
					document.getElementById( 'TD_FAVOLITE132' ).className = 'kumi';

					if( document.form.FAVOLITE_MARK12.value !== '9' ){

						 document.form.FAVOLITE113.disabled = false;
						 document.form.FAVOLITE123.disabled = false;
						 document.form.FAVOLITE133.disabled = false;
						 document.getElementById( 'FAVOLITE113' ).className = 'fm_f-waku';
						 document.getElementById( 'FAVOLITE123' ).className = 'fm_f-waku';
						 document.getElementById( 'FAVOLITE133' ).className = 'fm_f-waku';
						 document.getElementById( 'TD_FAVOLITE113' ).className = 'kumi';
						 document.getElementById( 'TD_FAVOLITE123' ).className = 'kumi';
						 document.getElementById( 'TD_FAVOLITE133' ).className = 'kumi';

					}else{

						 document.form.FAVOLITE113.disabled = true;
						 document.form.FAVOLITE123.disabled = true;
						 document.form.FAVOLITE133.disabled = true;
						 document.form.FAVOLITE113.value = '';
						 document.form.FAVOLITE123.value = '';
						 document.form.FAVOLITE133.value = '';
						 document.getElementById( 'FAVOLITE113' ).className = 'fm_f-waku2';
						 document.getElementById( 'FAVOLITE123' ).className = 'fm_f-waku2';
						 document.getElementById( 'FAVOLITE133' ).className = 'fm_f-waku2';
						 document.getElementById( 'TD_FAVOLITE113' ).className = 'kumi2';
						 document.getElementById( 'TD_FAVOLITE123' ).className = 'kumi2';
						 document.getElementById( 'TD_FAVOLITE133' ).className = 'kumi2';

					}
				 }
			
			}else if( selectId == 'FAVOLITE_MARK21' ){

				 if( document.form.FAVOLITE_MARK21.value == '8' ){

					document.form.FAVOLITE211.disabled = true;
					document.form.FAVOLITE212.disabled = false;
					document.form.FAVOLITE213.disabled = true;

					document.form.FAVOLITE222.disabled = false;
					document.form.FAVOLITE223.disabled = true;

					document.form.FAVOLITE232.disabled = false;
					document.form.FAVOLITE233.disabled = true;

					document.form.FAVOLITE211.value = '';
					document.form.FAVOLITE213.value = '';

					document.form.FAVOLITE223.value = '';

					document.form.FAVOLITE233.value = '';

					document.getElementById( 'FAVOLITE211' ).className = 'fm_f-waku2';
					document.getElementById( 'FAVOLITE212' ).className = 'fm_f-waku';
					document.getElementById( 'FAVOLITE213' ).className = 'fm_f-waku2';

					document.getElementById( 'FAVOLITE222' ).className = 'fm_f-waku';
					document.getElementById( 'FAVOLITE223' ).className = 'fm_f-waku2';

					document.getElementById( 'FAVOLITE232' ).className = 'fm_f-waku';
					document.getElementById( 'FAVOLITE233' ).className = 'fm_f-waku2';

					document.getElementById( 'TD_FAVOLITE211' ).className = 'kumi2';
					document.getElementById( 'TD_FAVOLITE212' ).className = 'kumi';
					document.getElementById( 'TD_FAVOLITE213' ).className = 'kumi2';

					document.getElementById( 'TD_FAVOLITE222' ).className = 'kumi';
					document.getElementById( 'TD_FAVOLITE223' ).className = 'kumi2';

					document.getElementById( 'TD_FAVOLITE232' ).className = 'kumi';
					document.getElementById( 'TD_FAVOLITE233' ).className = 'kumi2';

				 }else if( document.form.FAVOLITE_MARK21.value == '9' ){

					document.form.FAVOLITE211.disabled = false;
					document.getElementById( 'FAVOLITE211' ).className = 'fm_f-waku';
					document.getElementById( 'TD_FAVOLITE211' ).className = 'kumi';

					document.form.FAVOLITE212.disabled = true;
					document.form.FAVOLITE222.disabled = true;
					document.form.FAVOLITE232.disabled = true;
					document.form.FAVOLITE212.value = '';
					document.form.FAVOLITE222.value = '';
					document.form.FAVOLITE232.value = '';
					document.getElementById( 'FAVOLITE212' ).className = 'fm_f-waku2';
					document.getElementById( 'FAVOLITE222' ).className = 'fm_f-waku2';
					document.getElementById( 'FAVOLITE232' ).className = 'fm_f-waku2';
					document.getElementById( 'TD_FAVOLITE212' ).className = 'kumi2';
					document.getElementById( 'TD_FAVOLITE222' ).className = 'kumi2';
					document.getElementById( 'TD_FAVOLITE232' ).className = 'kumi2';

					if( document.form.FAVOLITE_MARK22.value !== '9' ){

						 document.form.FAVOLITE213.disabled = false;
						 document.form.FAVOLITE223.disabled = false;
						 document.form.FAVOLITE233.disabled = false;
						 document.getElementById( 'FAVOLITE213' ).className = 'fm_f-waku';
						 document.getElementById( 'FAVOLITE223' ).className = 'fm_f-waku';
						 document.getElementById( 'FAVOLITE233' ).className = 'fm_f-waku';
						 document.getElementById( 'TD_FAVOLITE213' ).className = 'kumi';
						 document.getElementById( 'TD_FAVOLITE223' ).className = 'kumi';
						 document.getElementById( 'TD_FAVOLITE233' ).className = 'kumi';

					}else{

						 document.form.FAVOLITE213.disabled = true;
						 document.form.FAVOLITE223.disabled = true;
						 document.form.FAVOLITE233.disabled = true;
						 document.form.FAVOLITE213.value = '';
						 document.form.FAVOLITE223.value = '';
						 document.form.FAVOLITE233.value = '';
						 document.getElementById( 'FAVOLITE213' ).className = 'fm_f-waku2';
						 document.getElementById( 'FAVOLITE223' ).className = 'fm_f-waku2';
						 document.getElementById( 'FAVOLITE233' ).className = 'fm_f-waku2';
						 document.getElementById( 'TD_FAVOLITE213' ).className = 'kumi2';
						 document.getElementById( 'TD_FAVOLITE223' ).className = 'kumi2';
						 document.getElementById( 'TD_FAVOLITE233' ).className = 'kumi2';

					}

				}else{

					document.form.FAVOLITE211.disabled = false;
					document.getElementById( 'FAVOLITE211' ).className = 'fm_f-waku';
					document.getElementById( 'TD_FAVOLITE211' ).className = 'kumi';

					document.form.FAVOLITE212.disabled = false;
					document.form.FAVOLITE222.disabled = false;
					document.form.FAVOLITE232.disabled = false;
					document.getElementById( 'FAVOLITE212' ).className = 'fm_f-waku';
					document.getElementById( 'FAVOLITE222' ).className = 'fm_f-waku';
					document.getElementById( 'FAVOLITE232' ).className = 'fm_f-waku';
					document.getElementById( 'TD_FAVOLITE212' ).className = 'kumi';
					document.getElementById( 'TD_FAVOLITE222' ).className = 'kumi';
					document.getElementById( 'TD_FAVOLITE232' ).className = 'kumi';

					if( document.form.FAVOLITE_MARK22.value !== '9' ){

						 document.form.FAVOLITE213.disabled = false;
						 document.form.FAVOLITE223.disabled = false;
						 document.form.FAVOLITE233.disabled = false;
						 document.getElementById( 'FAVOLITE213' ).className = 'fm_f-waku';
						 document.getElementById( 'FAVOLITE223' ).className = 'fm_f-waku';
						 document.getElementById( 'FAVOLITE233' ).className = 'fm_f-waku';
						 document.getElementById( 'TD_FAVOLITE213' ).className = 'kumi';
						 document.getElementById( 'TD_FAVOLITE223' ).className = 'kumi';
						 document.getElementById( 'TD_FAVOLITE233' ).className = 'kumi';

					}else{

						 document.form.FAVOLITE213.disabled = true;
						 document.form.FAVOLITE223.disabled = true;
						 document.form.FAVOLITE233.disabled = true;
						 document.form.FAVOLITE213.value = '';
						 document.form.FAVOLITE223.value = '';
						 document.form.FAVOLITE233.value = '';
						 document.getElementById( 'FAVOLITE213' ).className = 'fm_f-waku2';
						 document.getElementById( 'FAVOLITE223' ).className = 'fm_f-waku2';
						 document.getElementById( 'FAVOLITE233' ).className = 'fm_f-waku2';
						 document.getElementById( 'TD_FAVOLITE213' ).className = 'kumi2';
						 document.getElementById( 'TD_FAVOLITE223' ).className = 'kumi2';
						 document.getElementById( 'TD_FAVOLITE233' ).className = 'kumi2';

					}
				}

			}else if( selectId == 'FAVOLITE_MARK22' ){

				 if( document.form.FAVOLITE_MARK21.value == '8' ){

					document.form.FAVOLITE211.disabled = true;
					document.form.FAVOLITE212.disabled = false;
					document.form.FAVOLITE213.disabled = true;

					document.form.FAVOLITE222.disabled = false;
					document.form.FAVOLITE223.disabled = true;

					document.form.FAVOLITE232.disabled = false;
					document.form.FAVOLITE233.disabled = true;

					document.form.FAVOLITE211.value = '';
					document.form.FAVOLITE213.value = '';

					document.form.FAVOLITE223.value = '';

					document.form.FAVOLITE233.value = '';

					document.getElementById( 'FAVOLITE211' ).className = 'fm_f-waku2';
					document.getElementById( 'FAVOLITE212' ).className = 'fm_f-waku';
					document.getElementById( 'FAVOLITE213' ).className = 'fm_f-waku2';

					document.getElementById( 'FAVOLITE222' ).className = 'fm_f-waku';
					document.getElementById( 'FAVOLITE223' ).className = 'fm_f-waku2';

					document.getElementById( 'FAVOLITE232' ).className = 'fm_f-waku';
					document.getElementById( 'FAVOLITE233' ).className = 'fm_f-waku2';

					document.getElementById( 'TD_FAVOLITE211' ).className = 'kumi2';
					document.getElementById( 'TD_FAVOLITE212' ).className = 'kumi';
					document.getElementById( 'TD_FAVOLITE213' ).className = 'kumi2';

					document.getElementById( 'TD_FAVOLITE222' ).className = 'kumi';
					document.getElementById( 'TD_FAVOLITE223' ).className = 'kumi2';

					document.getElementById( 'TD_FAVOLITE232' ).className = 'kumi';
					document.getElementById( 'TD_FAVOLITE233' ).className = 'kumi2';

				 }else if( document.form.FAVOLITE_MARK21.value == '9' ){

					document.form.FAVOLITE212.disabled = true;
					document.form.FAVOLITE222.disabled = true;
					document.form.FAVOLITE232.disabled = true;
					document.form.FAVOLITE212.value = '';
					document.form.FAVOLITE222.value = '';
					document.form.FAVOLITE232.value = '';
					document.getElementById( 'FAVOLITE212' ).className = 'fm_f-waku2';
					document.getElementById( 'FAVOLITE222' ).className = 'fm_f-waku2';
					document.getElementById( 'FAVOLITE232' ).className = 'fm_f-waku2';
					document.getElementById( 'TD_FAVOLITE212' ).className = 'kumi2';
					document.getElementById( 'TD_FAVOLITE222' ).className = 'kumi2';
					document.getElementById( 'TD_FAVOLITE232' ).className = 'kumi2';

					if( document.form.FAVOLITE_MARK22.value !== '9' ){

						 document.form.FAVOLITE213.disabled = false;
						 document.form.FAVOLITE223.disabled = false;
						 document.form.FAVOLITE233.disabled = false;
						 document.getElementById( 'FAVOLITE213' ).className = 'fm_f-waku';
						 document.getElementById( 'FAVOLITE223' ).className = 'fm_f-waku';
						 document.getElementById( 'FAVOLITE233' ).className = 'fm_f-waku';
						 document.getElementById( 'TD_FAVOLITE213' ).className = 'kumi';
						 document.getElementById( 'TD_FAVOLITE223' ).className = 'kumi';
						 document.getElementById( 'TD_FAVOLITE233' ).className = 'kumi';

					}else{

						 document.form.FAVOLITE213.disabled = true;
						 document.form.FAVOLITE223.disabled = true;
						 document.form.FAVOLITE233.disabled = true;
						 document.form.FAVOLITE213.value = '';
						 document.form.FAVOLITE223.value = '';
						 document.form.FAVOLITE233.value = '';
						 document.getElementById( 'FAVOLITE213' ).className = 'fm_f-waku2';
						 document.getElementById( 'FAVOLITE223' ).className = 'fm_f-waku2';
						 document.getElementById( 'FAVOLITE233' ).className = 'fm_f-waku2';
						 document.getElementById( 'TD_FAVOLITE213' ).className = 'kumi2';
						 document.getElementById( 'TD_FAVOLITE223' ).className = 'kumi2';
						 document.getElementById( 'TD_FAVOLITE233' ).className = 'kumi2';

					}

				 }else{

					document.form.FAVOLITE212.disabled = false;
					document.form.FAVOLITE222.disabled = false;
					document.form.FAVOLITE232.disabled = false;
					document.getElementById( 'FAVOLITE212' ).className = 'fm_f-waku';
					document.getElementById( 'FAVOLITE222' ).className = 'fm_f-waku';
					document.getElementById( 'FAVOLITE232' ).className = 'fm_f-waku';
					document.getElementById( 'TD_FAVOLITE212' ).className = 'kumi';
					document.getElementById( 'TD_FAVOLITE222' ).className = 'kumi';
					document.getElementById( 'TD_FAVOLITE232' ).className = 'kumi';

					if( document.form.FAVOLITE_MARK22.value !== '9' ){

						 document.form.FAVOLITE213.disabled = false;
						 document.form.FAVOLITE223.disabled = false;
						 document.form.FAVOLITE233.disabled = false;
						 document.getElementById( 'FAVOLITE213' ).className = 'fm_f-waku';
						 document.getElementById( 'FAVOLITE223' ).className = 'fm_f-waku';
						 document.getElementById( 'FAVOLITE233' ).className = 'fm_f-waku';
						 document.getElementById( 'TD_FAVOLITE213' ).className = 'kumi';
						 document.getElementById( 'TD_FAVOLITE223' ).className = 'kumi';
						 document.getElementById( 'TD_FAVOLITE233' ).className = 'kumi';

					}else{

						 document.form.FAVOLITE213.disabled = true;
						 document.form.FAVOLITE223.disabled = true;
						 document.form.FAVOLITE233.disabled = true;
						 document.form.FAVOLITE213.value = '';
						 document.form.FAVOLITE223.value = '';
						 document.form.FAVOLITE233.value = '';
						 document.getElementById( 'FAVOLITE213' ).className = 'fm_f-waku2';
						 document.getElementById( 'FAVOLITE223' ).className = 'fm_f-waku2';
						 document.getElementById( 'FAVOLITE233' ).className = 'fm_f-waku2';
						 document.getElementById( 'TD_FAVOLITE213' ).className = 'kumi2';
						 document.getElementById( 'TD_FAVOLITE223' ).className = 'kumi2';
						 document.getElementById( 'TD_FAVOLITE233' ).className = 'kumi2';

					}
				 }

			}else if( selectId == 'RICH_MARK11' ){

				 if( document.form.RICH_MARK11.value == '8' ){

					document.form.RICH111.disabled = true;
					document.form.RICH112.disabled = false;
					document.form.RICH113.disabled = true;

					document.form.RICH122.disabled = false;
					document.form.RICH123.disabled = true;

					document.form.RICH132.disabled = false;
					document.form.RICH133.disabled = true;

					document.form.RICH111.value = '';
					document.form.RICH113.value = '';

					document.form.RICH123.value = '';

					document.form.RICH133.value = '';

					document.getElementById( 'RICH111' ).className = 'fm_f-waku2';
					document.getElementById( 'RICH112' ).className = 'fm_f-waku';
					document.getElementById( 'RICH113' ).className = 'fm_f-waku2';

					document.getElementById( 'RICH122' ).className = 'fm_f-waku';
					document.getElementById( 'RICH123' ).className = 'fm_f-waku2';

					document.getElementById( 'RICH132' ).className = 'fm_f-waku';
					document.getElementById( 'RICH133' ).className = 'fm_f-waku2';

					document.getElementById( 'TD_RICH111' ).className = 'kumi2';
					document.getElementById( 'TD_RICH112' ).className = 'kumi';
					document.getElementById( 'TD_RICH113' ).className = 'kumi2';

					document.getElementById( 'TD_RICH122' ).className = 'kumi';
					document.getElementById( 'TD_RICH123' ).className = 'kumi2';

					document.getElementById( 'TD_RICH132' ).className = 'kumi';
					document.getElementById( 'TD_RICH133' ).className = 'kumi2';


				 }else if( document.form.RICH_MARK11.value == '9' ){

					document.form.RICH111.disabled = false;
					document.getElementById( 'RICH111' ).className = 'fm_f-waku';
					document.getElementById( 'TD_RICH111' ).className = 'kumi';

					document.form.RICH112.disabled = true;
					document.form.RICH122.disabled = true;
					document.form.RICH132.disabled = true;
					document.form.RICH112.value = '';
					document.form.RICH122.value = '';
					document.form.RICH132.value = '';

					document.getElementById( 'RICH112' ).className = 'fm_f-waku2';
					document.getElementById( 'RICH122' ).className = 'fm_f-waku2';
					document.getElementById( 'RICH132' ).className = 'fm_f-waku2';
					document.getElementById( 'TD_RICH112' ).className = 'kumi2';
					document.getElementById( 'TD_RICH122' ).className = 'kumi2';
					document.getElementById( 'TD_RICH132' ).className = 'kumi2';

					if( document.form.RICH_MARK12.value !== '9' ){

						document.form.RICH113.disabled = false;
						document.form.RICH123.disabled = false;
						document.form.RICH133.disabled = false;
						document.getElementById( 'RICH113' ).className = 'fm_f-waku';
						document.getElementById( 'RICH123' ).className = 'fm_f-waku';
						document.getElementById( 'RICH133' ).className = 'fm_f-waku';
						document.getElementById( 'TD_RICH113' ).className = 'kumi';
						document.getElementById( 'TD_RICH123' ).className = 'kumi';
						document.getElementById( 'TD_RICH133' ).className = 'kumi';

					}else{

						document.form.RICH113.disabled = true;
						document.form.RICH123.disabled = true;
						document.form.RICH133.disabled = true;
						document.form.RICH113.value = '';
						document.form.RICH123.value = '';
						document.form.RICH133.value = '';
						document.getElementById( 'RICH113' ).className = 'fm_f-waku2';
						document.getElementById( 'RICH123' ).className = 'fm_f-waku2';
						document.getElementById( 'RICH133' ).className = 'fm_f-waku2';
						document.getElementById( 'TD_RICH113' ).className = 'kumi2';
						document.getElementById( 'TD_RICH123' ).className = 'kumi2';
						document.getElementById( 'TD_RICH133' ).className = 'kumi2';

					}

				 }else{

					document.form.RICH111.disabled = false;
					document.getElementById( 'RICH111' ).className = 'fm_f-waku';
					document.getElementById( 'TD_RICH111' ).className = 'kumi';

					document.form.RICH112.disabled = false;
					document.form.RICH122.disabled = false;
					document.form.RICH132.disabled = false;
					document.getElementById( 'RICH112' ).className = 'fm_f-waku';
					document.getElementById( 'RICH122' ).className = 'fm_f-waku';
					document.getElementById( 'RICH132' ).className = 'fm_f-waku';
					document.getElementById( 'TD_RICH112' ).className = 'kumi';
					document.getElementById( 'TD_RICH122' ).className = 'kumi';
					document.getElementById( 'TD_RICH132' ).className = 'kumi';

					if( document.form.RICH_MARK12.value !== '9' ){

						document.form.RICH113.disabled = false;
						document.form.RICH123.disabled = false;
						document.form.RICH133.disabled = false;
						document.getElementById( 'RICH113' ).className = 'fm_f-waku';
						document.getElementById( 'RICH123' ).className = 'fm_f-waku';
						document.getElementById( 'RICH133' ).className = 'fm_f-waku';
						document.getElementById( 'TD_RICH113' ).className = 'kumi';
						document.getElementById( 'TD_RICH123' ).className = 'kumi';
						document.getElementById( 'TD_RICH133' ).className = 'kumi';

					}else{

						document.form.RICH113.disabled = true;
						document.form.RICH123.disabled = true;
						document.form.RICH133.disabled = true;
						document.form.RICH113.value = '';
						document.form.RICH123.value = '';
						document.form.RICH133.value = '';
						document.getElementById( 'RICH113' ).className = 'fm_f-waku2';
						document.getElementById( 'RICH123' ).className = 'fm_f-waku2';
						document.getElementById( 'RICH133' ).className = 'fm_f-waku2';
						document.getElementById( 'TD_RICH113' ).className = 'kumi2';
						document.getElementById( 'TD_RICH123' ).className = 'kumi2';
						document.getElementById( 'TD_RICH133' ).className = 'kumi2';

					}

				 }
				 
			}else if( selectId == 'RICH_MARK12' ){

				 if( document.form.RICH_MARK11.value == '8' ){

					document.form.RICH111.disabled = true;
					document.form.RICH112.disabled = false;
					document.form.RICH113.disabled = true;

					document.form.RICH122.disabled = false;
					document.form.RICH123.disabled = true;

					document.form.RICH132.disabled = false;
					document.form.RICH133.disabled = true;

					document.form.RICH111.value = '';
					document.form.RICH113.value = '';

					document.form.RICH123.value = '';

					document.form.RICH133.value = '';

					document.getElementById( 'RICH111' ).className = 'fm_f-waku2';
					document.getElementById( 'RICH112' ).className = 'fm_f-waku';
					document.getElementById( 'RICH113' ).className = 'fm_f-waku2';

					document.getElementById( 'RICH122' ).className = 'fm_f-waku';
					document.getElementById( 'RICH123' ).className = 'fm_f-waku2';

					document.getElementById( 'RICH132' ).className = 'fm_f-waku';
					document.getElementById( 'RICH133' ).className = 'fm_f-waku2';

					document.getElementById( 'TD_RICH111' ).className = 'kumi2';
					document.getElementById( 'TD_RICH112' ).className = 'kumi';
					document.getElementById( 'TD_RICH113' ).className = 'kumi2';

					document.getElementById( 'TD_RICH122' ).className = 'kumi';
					document.getElementById( 'TD_RICH123' ).className = 'kumi2';

					document.getElementById( 'TD_RICH132' ).className = 'kumi';
					document.getElementById( 'TD_RICH133' ).className = 'kumi2';


				 }else if( document.form.RICH_MARK11.value == '9' ){

					document.form.RICH111.disabled = false;
					document.getElementById( 'RICH111' ).className = 'fm_f-waku';
					document.getElementById( 'TD_RICH111' ).className = 'kumi';

					document.form.RICH112.disabled = true;
					document.form.RICH122.disabled = true;
					document.form.RICH132.disabled = true;
					document.form.RICH112.value = '';
					document.form.RICH122.value = '';
					document.form.RICH132.value = '';
					document.getElementById( 'RICH112' ).className = 'fm_f-waku2';
					document.getElementById( 'RICH122' ).className = 'fm_f-waku2';
					document.getElementById( 'RICH132' ).className = 'fm_f-waku2';
					document.getElementById( 'TD_RICH112' ).className = 'kumi2';
					document.getElementById( 'TD_RICH122' ).className = 'kumi2';
					document.getElementById( 'TD_RICH132' ).className = 'kumi2';

					if( document.form.RICH_MARK12.value !== '9' ){
						document.form.RICH113.disabled = false;
						document.form.RICH123.disabled = false;
						document.form.RICH133.disabled = false;
						document.getElementById( 'RICH113' ).className = 'fm_f-waku';
						document.getElementById( 'RICH123' ).className = 'fm_f-waku';
						document.getElementById( 'RICH133' ).className = 'fm_f-waku';
						document.getElementById( 'TD_RICH113' ).className = 'kumi';
						document.getElementById( 'TD_RICH123' ).className = 'kumi';
						document.getElementById( 'TD_RICH133' ).className = 'kumi';
					}else{

						document.form.RICH113.disabled = true;
						document.form.RICH123.disabled = true;
						document.form.RICH133.disabled = true;
						document.form.RICH113.value = '';
						document.form.RICH123.value = '';
						document.form.RICH133.value = '';
						document.getElementById( 'RICH113' ).className = 'fm_f-waku2';
						document.getElementById( 'RICH123' ).className = 'fm_f-waku2';
						document.getElementById( 'RICH133' ).className = 'fm_f-waku2';
						document.getElementById( 'TD_RICH113' ).className = 'kumi2';
						document.getElementById( 'TD_RICH123' ).className = 'kumi2';
						document.getElementById( 'TD_RICH133' ).className = 'kumi2';

					}


				 }else{

					document.form.RICH111.disabled = false;
					document.getElementById( 'RICH111' ).className = 'fm_f-waku';
					document.getElementById( 'TD_RICH111' ).className = 'kumi';

					document.form.RICH112.disabled = false;
					document.form.RICH122.disabled = false;
					document.form.RICH132.disabled = false;
					document.getElementById( 'RICH112' ).className = 'fm_f-waku';
					document.getElementById( 'RICH122' ).className = 'fm_f-waku';
					document.getElementById( 'RICH132' ).className = 'fm_f-waku';
					document.getElementById( 'TD_RICH112' ).className = 'kumi';
					document.getElementById( 'TD_RICH122' ).className = 'kumi';
					document.getElementById( 'TD_RICH132' ).className = 'kumi';

					if( document.form.RICH_MARK12.value !== '9' ){
						document.form.RICH113.disabled = false;
						document.form.RICH123.disabled = false;
						document.form.RICH133.disabled = false;
						document.getElementById( 'RICH113' ).className = 'fm_f-waku';
						document.getElementById( 'RICH123' ).className = 'fm_f-waku';
						document.getElementById( 'RICH133' ).className = 'fm_f-waku';
						document.getElementById( 'TD_RICH113' ).className = 'kumi';
						document.getElementById( 'TD_RICH123' ).className = 'kumi';
						document.getElementById( 'TD_RICH133' ).className = 'kumi';
					}else{

						document.form.RICH113.disabled = true;
						document.form.RICH123.disabled = true;
						document.form.RICH133.disabled = true;
						document.form.RICH113.value = '';
						document.form.RICH123.value = '';
						document.form.RICH133.value = '';
						document.getElementById( 'RICH113' ).className = 'fm_f-waku2';
						document.getElementById( 'RICH123' ).className = 'fm_f-waku2';
						document.getElementById( 'RICH133' ).className = 'fm_f-waku2';
						document.getElementById( 'TD_RICH113' ).className = 'kumi2';
						document.getElementById( 'TD_RICH123' ).className = 'kumi2';
						document.getElementById( 'TD_RICH133' ).className = 'kumi2';

					}

				 }

			}else if( selectId == 'RICH_MARK21' ){

				 if( document.form.RICH_MARK21.value == '8' ){

					document.form.RICH211.disabled = true;
					document.form.RICH212.disabled = false;
					document.form.RICH213.disabled = true;

					document.form.RICH222.disabled = false;
					document.form.RICH223.disabled = true;

					document.form.RICH232.disabled = false;
					document.form.RICH233.disabled = true;

					document.form.RICH211.value = '';
					document.form.RICH213.value = '';

					document.form.RICH223.value = '';

					document.form.RICH233.value = '';

					document.getElementById( 'RICH211' ).className = 'fm_f-waku2';
					document.getElementById( 'RICH212' ).className = 'fm_f-waku';
					document.getElementById( 'RICH213' ).className = 'fm_f-waku2';

					document.getElementById( 'RICH222' ).className = 'fm_f-waku';
					document.getElementById( 'RICH223' ).className = 'fm_f-waku2';

					document.getElementById( 'RICH232' ).className = 'fm_f-waku';
					document.getElementById( 'RICH233' ).className = 'fm_f-waku2';

					document.getElementById( 'TD_RICH211' ).className = 'kumi2';
					document.getElementById( 'TD_RICH212' ).className = 'kumi';
					document.getElementById( 'TD_RICH213' ).className = 'kumi2';

					document.getElementById( 'TD_RICH222' ).className = 'kumi';
					document.getElementById( 'TD_RICH223' ).className = 'kumi2';

					document.getElementById( 'TD_RICH232' ).className = 'kumi';
					document.getElementById( 'TD_RICH233' ).className = 'kumi2';

				 }else if( document.form.RICH_MARK21.value == '9' ){

					document.form.RICH211.disabled = false;
					document.getElementById( 'RICH211' ).className = 'fm_f-waku';
					document.getElementById( 'TD_RICH211' ).className = 'kumi';

					document.form.RICH212.disabled = true;
					document.form.RICH222.disabled = true;
					document.form.RICH232.disabled = true;
					document.form.RICH212.value = '';
					document.form.RICH222.value = '';
					document.form.RICH232.value = '';
					document.getElementById( 'RICH212' ).className = 'fm_f-waku2';
					document.getElementById( 'RICH222' ).className = 'fm_f-waku2';
					document.getElementById( 'RICH232' ).className = 'fm_f-waku2';
					document.getElementById( 'TD_RICH212' ).className = 'kumi2';
					document.getElementById( 'TD_RICH222' ).className = 'kumi2';
					document.getElementById( 'TD_RICH232' ).className = 'kumi2';

					if( document.form.RICH_MARK22.value !== '9' ){

						 document.form.RICH213.disabled = false;
						 document.form.RICH223.disabled = false;
						 document.form.RICH233.disabled = false;
						 document.getElementById( 'RICH213' ).className = 'fm_f-waku';
						 document.getElementById( 'RICH223' ).className = 'fm_f-waku';
						 document.getElementById( 'RICH233' ).className = 'fm_f-waku';
						 document.getElementById( 'TD_RICH213' ).className = 'kumi';
						 document.getElementById( 'TD_RICH223' ).className = 'kumi';
						 document.getElementById( 'TD_RICH233' ).className = 'kumi';

					}else{

						 document.form.RICH213.disabled = true;
						 document.form.RICH223.disabled = true;
						 document.form.RICH233.disabled = true;
						 document.form.RICH213.value = '';
						 document.form.RICH223.value = '';
						 document.form.RICH233.value = '';
						 document.getElementById( 'RICH213' ).className = 'fm_f-waku2';
						 document.getElementById( 'RICH223' ).className = 'fm_f-waku2';
						 document.getElementById( 'RICH233' ).className = 'fm_f-waku2';
						 document.getElementById( 'TD_RICH213' ).className = 'kumi2';
						 document.getElementById( 'TD_RICH223' ).className = 'kumi2';
						 document.getElementById( 'TD_RICH233' ).className = 'kumi2';

					}

				 }else{


					document.form.RICH211.disabled = false;
					document.getElementById( 'RICH211' ).className = 'fm_f-waku';
					document.getElementById( 'TD_RICH211' ).className = 'kumi';

					document.form.RICH212.disabled = false;
					document.form.RICH222.disabled = false;
					document.form.RICH232.disabled = false;
					document.getElementById( 'RICH212' ).className = 'fm_f-waku';
					document.getElementById( 'RICH222' ).className = 'fm_f-waku';
					document.getElementById( 'RICH232' ).className = 'fm_f-waku';
					document.getElementById( 'TD_RICH212' ).className = 'kumi';
					document.getElementById( 'TD_RICH222' ).className = 'kumi';
					document.getElementById( 'TD_RICH232' ).className = 'kumi';

					if( document.form.RICH_MARK22.value !== '9' ){

						 document.form.RICH213.disabled = false;
						 document.form.RICH223.disabled = false;
						 document.form.RICH233.disabled = false;
						 document.getElementById( 'RICH213' ).className = 'fm_f-waku';
						 document.getElementById( 'RICH223' ).className = 'fm_f-waku';
						 document.getElementById( 'RICH233' ).className = 'fm_f-waku';
						 document.getElementById( 'TD_RICH213' ).className = 'kumi';
						 document.getElementById( 'TD_RICH223' ).className = 'kumi';
						 document.getElementById( 'TD_RICH233' ).className = 'kumi';

					}else{

						 document.form.RICH213.disabled = true;
						 document.form.RICH223.disabled = true;
						 document.form.RICH233.disabled = true;
						 document.form.RICH213.value = '';
						 document.form.RICH223.value = '';
						 document.form.RICH233.value = '';
						 document.getElementById( 'RICH213' ).className = 'fm_f-waku2';
						 document.getElementById( 'RICH223' ).className = 'fm_f-waku2';
						 document.getElementById( 'RICH233' ).className = 'fm_f-waku2';
						 document.getElementById( 'TD_RICH213' ).className = 'kumi2';
						 document.getElementById( 'TD_RICH223' ).className = 'kumi2';
						 document.getElementById( 'TD_RICH233' ).className = 'kumi2';

					}

				 }

			}else if( selectId == 'RICH_MARK22' ){

				 if( document.form.RICH_MARK21.value == '8' ){

					document.form.RICH211.disabled = true;
					document.form.RICH212.disabled = false;
					document.form.RICH213.disabled = true;

					document.form.RICH222.disabled = false;
					document.form.RICH223.disabled = true;

					document.form.RICH232.disabled = false;
					document.form.RICH233.disabled = true;

					document.form.RICH211.value = '';
					document.form.RICH213.value = '';

					document.form.RICH223.value = '';

					document.form.RICH233.value = '';

					document.getElementById( 'RICH211' ).className = 'fm_f-waku2';
					document.getElementById( 'RICH212' ).className = 'fm_f-waku';
					document.getElementById( 'RICH213' ).className = 'fm_f-waku2';

					document.getElementById( 'RICH222' ).className = 'fm_f-waku';
					document.getElementById( 'RICH223' ).className = 'fm_f-waku2';

					document.getElementById( 'RICH232' ).className = 'fm_f-waku';
					document.getElementById( 'RICH233' ).className = 'fm_f-waku2';

					document.getElementById( 'TD_RICH211' ).className = 'kumi2';
					document.getElementById( 'TD_RICH212' ).className = 'kumi';
					document.getElementById( 'TD_RICH213' ).className = 'kumi2';

					document.getElementById( 'TD_RICH222' ).className = 'kumi';
					document.getElementById( 'TD_RICH223' ).className = 'kumi2';

					document.getElementById( 'TD_RICH232' ).className = 'kumi';
					document.getElementById( 'TD_RICH233' ).className = 'kumi2';

				 }else if( document.form.RICH_MARK21.value == '9' ){

					document.form.RICH211.disabled = false;
					document.getElementById( 'RICH211' ).className = 'fm_f-waku';
					document.getElementById( 'TD_RICH211' ).className = 'kumi';

					document.form.RICH212.disabled = true;
					document.form.RICH222.disabled = true;
					document.form.RICH232.disabled = true;

					document.form.RICH212.value = '';
					document.form.RICH222.value = '';
					document.form.RICH232.value = '';
					document.getElementById( 'RICH212' ).className = 'fm_f-waku2';
					document.getElementById( 'RICH222' ).className = 'fm_f-waku2';
					document.getElementById( 'RICH232' ).className = 'fm_f-waku2';
					document.getElementById( 'TD_RICH212' ).className = 'kumi2';
					document.getElementById( 'TD_RICH222' ).className = 'kumi2';
					document.getElementById( 'TD_RICH232' ).className = 'kumi2';

					if( document.form.RICH_MARK22.value !== '9' ){

						 document.form.RICH213.disabled = false;
						 document.form.RICH223.disabled = false;
						 document.form.RICH233.disabled = false;
						 document.getElementById( 'RICH213' ).className = 'fm_f-waku';
						 document.getElementById( 'RICH223' ).className = 'fm_f-waku';
						 document.getElementById( 'RICH233' ).className = 'fm_f-waku';
						 document.getElementById( 'TD_RICH213' ).className = 'kumi';
						 document.getElementById( 'TD_RICH223' ).className = 'kumi';
						 document.getElementById( 'TD_RICH233' ).className = 'kumi';

					}else{

						 document.form.RICH213.disabled = true;
						 document.form.RICH223.disabled = true;
						 document.form.RICH233.disabled = true;
						 document.form.RICH213.value = '';
						 document.form.RICH223.value = '';
						 document.form.RICH233.value = '';
						 document.getElementById( 'RICH213' ).className = 'fm_f-waku2';
						 document.getElementById( 'RICH223' ).className = 'fm_f-waku2';
						 document.getElementById( 'RICH233' ).className = 'fm_f-waku2';
						 document.getElementById( 'TD_RICH213' ).className = 'kumi2';
						 document.getElementById( 'TD_RICH223' ).className = 'kumi2';
						 document.getElementById( 'TD_RICH233' ).className = 'kumi2';

					}

				 }else{

					document.form.RICH211.disabled = false;
					document.getElementById( 'RICH211' ).className = 'fm_f-waku';
					document.getElementById( 'TD_RICH211' ).className = 'kumi';

					document.form.RICH212.disabled = false;
					document.form.RICH222.disabled = false;
					document.form.RICH232.disabled = false;
					document.getElementById( 'RICH212' ).className = 'fm_f-waku';
					document.getElementById( 'RICH222' ).className = 'fm_f-waku';
					document.getElementById( 'RICH232' ).className = 'fm_f-waku';
					document.getElementById( 'TD_RICH212' ).className = 'kumi';
					document.getElementById( 'TD_RICH222' ).className = 'kumi';
					document.getElementById( 'TD_RICH232' ).className = 'kumi';

					if( document.form.RICH_MARK22.value !== '9' ){

						 document.form.RICH213.disabled = false;
						 document.form.RICH223.disabled = false;
						 document.form.RICH233.disabled = false;
						 document.getElementById( 'RICH213' ).className = 'fm_f-waku';
						 document.getElementById( 'RICH223' ).className = 'fm_f-waku';
						 document.getElementById( 'RICH233' ).className = 'fm_f-waku';
						 document.getElementById( 'TD_RICH213' ).className = 'kumi';
						 document.getElementById( 'TD_RICH223' ).className = 'kumi';
						 document.getElementById( 'TD_RICH233' ).className = 'kumi';

					}else{

						 document.form.RICH213.disabled = true;
						 document.form.RICH223.disabled = true;
						 document.form.RICH233.disabled = true;
						 document.form.RICH213.value = '';
						 document.form.RICH223.value = '';
						 document.form.RICH233.value = '';
						 document.getElementById( 'RICH213' ).className = 'fm_f-waku2';
						 document.getElementById( 'RICH223' ).className = 'fm_f-waku2';
						 document.getElementById( 'RICH233' ).className = 'fm_f-waku2';
						 document.getElementById( 'TD_RICH213' ).className = 'kumi2';
						 document.getElementById( 'TD_RICH223' ).className = 'kumi2';
						 document.getElementById( 'TD_RICH233' ).className = 'kumi2';

					}
				 }

			}



			var id = 'jq_imageselect_' + selectName;

			if($('#'+id).length == 1){

				$('#'+id + ' .jqis_dropdown').slideUp().hide();

			}
		},
		remove: function(){
			if(!/select/i.test(this.tagName)){return false;}

			var element = $(this);

			var selectName = element.attr('name');
			var id = 'jq_imageselect_' + selectName;

			if($('#'+id).length > 0){
				$('#'+id).remove();
				$('select[name=' + selectName + ']').show();
				return;
			}
		}
	};


	$.fn.ImageSelect = function(method,options) {

		if(method == undefined){
			method = 'init';
		}

		var settings = {
			width:30,
			height:75,
			dropdownHeight:500,
			dropdownWidth:30,
			z:99999,
			backgroundColor:'#ffffff',
			border:false,
			borderColor:'#ffffff',
			lock:'width'
		};

		if ( options) { $.extend( settings, options ); }

		if(typeof method === 'object'){$.extend( settings, method );}

		settings.dropdownWidth = settings.width - 10;

		return this.each(function() {
			if ( methods[method] ) {
				return methods[method].apply( this, Array(settings));
			} else if ( typeof method === 'object' || ! method ) {
				return methods.init.apply( this, Array(settings) );
			} else {
				$.error( 'Method ' +method + ' does not exist on jQuery.ImageSelect' );
			}
		});

	};
})( jQuery );