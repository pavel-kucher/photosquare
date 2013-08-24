/* скрипт добавление  в корзину и обратно в галерею*/
$(function()
{	
var $gallery = $("#gallery"),$trash = $("#trash");
var $list;
var array_images =  new Array();

$( "li", $gallery ).draggable({
	cancel: "a.ui-icon", // clicking an icon won't initiate dragging
	revert: "invalid", //если не перемещен в куда либо возвращается обратно 
	containment: "document",
	helper: "clone",
	cursor: "move",
	start: function(event,ui){ 
		/*console.log(ui.helper);*/
		/*console.log(ui);*/
		/*console.log(event);*/
		/*if(ui.item.parent)alert('wdwddwd');*/
		/*  */
		/*alert(ui.draggable.attr('id'));*/
		//$list = $("#gallery").find(".selected");/*var list = $galery.find('.selected');*/
		/*list.each(function(data){alert('fefe');});*/
		array_images = new Array();
		//console.log(event.target.id);
		var name = '#'+event.target.id;
	
		/*console.log(name);*/
		var name = $(name);
		if(!name.hasClass('selected')) name.addClass('selected');/*добавили класс выбранному*/
		$('#gallery').children('li').each(function()
		{
			if((event.target.id != $(this).attr('id'))&&($(this).attr('id') != undefined))
			{
				//alert(event.target.id +'  __   '+$(this).attr('id'));
				if($(this).hasClass('selected'))
				{
					array_images.push($(this).attr('id'));
					//alert($(this).hasClass('selected'));	//bl++; 	/*image_name_change*/
							/*$(this).removeClass('ui-selected');*/
							/*$(this).find('a').removeClass('ui-selectee');*/
							/*$(this).find('a').addClass('image_name_ch');
							alert('а');*/ 	/*var my = $(this).detach();	my.insertBefore(id_);}*/
					console.log(array_images);
					console.log(array_images.length);
					//ui.helper.addClass('count_images');
					//alert($list.length);
				}
			}
		})
		ui.helper.append('<div class=count_images>'+(array_images.length+1)+'</div>')
	},	
});

$trash.droppable({
	accept: "#gallery > li",
	activeClass: "ui-state-highlight", 
	drop: function( event, ui ){
	deleteImage( ui.draggable );}});

$gallery.droppable({
	accept: "#trash li", activeClass: "custom-state-active", 
	drop: function( event, ui ){recycleImage( ui.draggable );} });


function deleteImage( $item ){
	$item.fadeOut(function(){
		var $list = $( "ul", $trash ).length?$("ul",$trash):$("<ul/>" ).appendTo( $trash );
		$item.appendTo( $list ).fadeIn(function(){
			/* тут удаление элемента и аджакс  append(recycle_icon)   $item.find("a.ui-icon-trash").remove()
			 * $item.animate({ width: "48px" }).find( "img" ).animate({ height: "36px" });*//*$("<ul class='gallery ui-helper-reset'/>" ).appendTo( $trash );*/
		});	});}

function recycleImage( $item ){
	$item.fadeOut(function(){
	$item.find("img").css("height", "72px").end()
	.appendTo($gallery).fadeIn();});}
});

/*	скрипт в 1 сторону	*/
/* работа скрипта загружаем основное меню со всеми изображениями альбомами
все изображения  -drogable - selectable в альбомы просто добавляется в корзину удаляется
альбом  -drogable - selectable - sortable  копируется либо переносится в соседний альбом (контрл)
корзина  -drogable - selectable  в альбом востанавливается в лиьо  во все изображения (эфект как с альбомом)
*/
albumsssssssssssssssssssssssssssssssssssssssssssss
<script>
$(function()
{	
var $gallery = $("#gallery_album"),$trash = $("#lib_trash"),
$albums = $(".lib_drop_album"),$th = $("#lib_trash");
var $list;
var array_images =  new Array();

$( "li", $gallery ).draggable({
	cancel: "a.ui-icon", // clicking an icon won't initiate dragging
	revert: "invalid", //если не перемещен в куда либо возвращается обратно 
	containment: "document",
	helper: "clone",
	cursor: "move",
	start: function(event,ui){ 
		array_images = new Array();	var name = '#'+event.target.id;	var name = $(name);
		if(!name.hasClass('selected')){$('#gallery_all').children('li').each(function(){$(this).removeClass('selected');});
			name.addClass('selected');}/*добавили класс выбранному если небыл выбран деселектим остальные*/
		$('#gallery_all').children('li').each(function()
		{	/*if((event.target.id != $(this).attr('id'))&&($(this).attr('id') != undefined)&&($(this).hasClass('selected')))*/
			if(($(this).attr('id') != undefined)&&($(this).hasClass('selected'))) array_images.push($(this).attr('id'));
		});
		ui.helper.find('span.image').append('<div class=count_images>'+(array_images.length)+'</div>');
			if(array_images.length>1)ui.helper.find('span.image').append('<span class="library-drag-image1"> </span>');
			if(array_images.length>2)ui.helper.find('span.image').append('<span class="library-drag-image2"> </span>');
		$('.jspContainer').append('<div class="backdrop"></div>');
		//ui.helper.append('<div class=lib_draggable_images></div>');
	},
	stop: function(event,ui){	$('.jspContainer').find('.backdrop').remove();}
});

$trash.droppable({	accept: "#gallery_all > li", activeClass: "ui-state-highlight", 
	drop: function( event, ui ){delete_images( ui.draggable );} });
	
$albums.droppable({ accept: "#gallery_all > li", activeClass: "ui-state-highlight", 
	drop: function( event, ui ){insert_all_images( event, ui );} });


function delete_images( $item ){	$.post("<?=URL;?>admin/lib_trash_images", {'array_images': array_images }, function(data)
{if(data == '1'){ $(array_images).each(function(){
		$('#'+this).fadeOut(); /*!!!!!! сообщение*/ 
});} },'json');/* отсылаем удаленные картинки id шники*/}

function insert_all_images( event, ui ){
	var id_album = $(event.target).attr('id');	id_album = id_album.substring(0,id_album.indexOf('_album'));
	$.post("<?=URL;?>admin/lib_album_img_add", {'array_images': array_images, 'lib_album': id_album }, function(data)
	{
		if(data == '1'){ /*!!!!!! сообщение*/}
	},'json');}

});



/*********************************************************************************************/


$(function()
{	
var $gallery = $("#gallery_all"),$trash = $("#lib_trash"),
$albums = $(".lib_drop_album"),$th = $("#lib_trash");
var $list;
var array_images =  new Array();

$( "li", $gallery ).draggable({
	cancel: "a.ui-icon", // clicking an icon won't initiate dragging
	revert: "invalid", //если не перемещен в куда либо возвращается обратно 
	containment: "document",
	helper: "clone",
	cursor: "move",
	start: function(event,ui){ 
		array_images = new Array();	var name = '#'+event.target.id;	var name = $(name);
		if(!name.hasClass('selected')){$('#gallery_all').children('li').each(function(){$(this).removeClass('selected');});
			name.addClass('selected');}/*добавили класс выбранному если небыл выбран деселектим остальные*/
		$('#gallery_all').children('li').each(function()
		{	/*if((event.target.id != $(this).attr('id'))&&($(this).attr('id') != undefined)&&($(this).hasClass('selected')))*/
			if(($(this).attr('id') != undefined)&&($(this).hasClass('selected'))) array_images.push($(this).attr('id'));
		});
		ui.helper.find('span.image').append('<div class=count_images>'+(array_images.length)+'</div>');
			if(array_images.length>1)ui.helper.find('span.image').append('<span class="lib_draggable_images"> </span>');
			if(array_images.length>2)ui.helper.find('span.image').append('<span class="lib_draggable_images2"> </span>');
		$('.col-content-inner').append('<div class="backdor fade in"></div>');
		//ui.helper.append('<div class=lib_draggable_images></div>');
	},
	stop: function(event,ui){	$('.col-content-inner').find('.backdor').remove();}
});

$trash.droppable({	accept: "#gallery_all > li", activeClass: "ui-state-highlight", 
	drop: function( event, ui ){delete_images( ui.draggable );} });
	
$albums.droppable({ accept: "#gallery_all > li", activeClass: "ui-state-highlight", 
	drop: function( event, ui ){insert_all_images( event, ui );} });


function delete_images( $item ){	$.post("<?=URL;?>admin/lib_trash_images", {'array_images': array_images }, function(data)
{if(data == '1'){ $(array_images).each(function(){
		$('#'+this).fadeOut(); /*!!!!!! сообщение*/ 
});} },'json');/* отсылаем удаленные картинки id шники*/}

function insert_all_images( event, ui ){
	var id_album = $(event.target).attr('id');	id_album = id_album.substring(0,id_album.indexOf('_album'));
	$.post("<?=URL;?>admin/lib_album_img_add", {'array_images': array_images, 'lib_album': id_album }, function(data)
	{
		if(data == '1'){ /*!!!!!! сообщение*/}
	},'json');}


});


/*
$(function(){
	$("#sortable")
	.sortable({ handle: ".handle", revert: true, items: "li:not(.btn-add)", placeholder: "list-placeholder", stop: function(event, ui){ $("#message").show();
	arr = new Array();
	$(this).children().each(function(){	arr.push(this.id);});
	var id_page = $('input[name="name_album"]').val();
	$.post("/admin/sort_photos_in_album", {'mas': arr, 'id_page': id_page }, function(o){ $("#message").hide();}),'json';}})
	.selectable({ cancel: ".btn-add, .name" })
	.find( "li" )
	});*/

/*substring()  document.write(str.substring(4)); // ет веселый мир!

document.write(str.substring(2,5)); // иве

document.write(str.substring(5,2)); // иве

document.write(str.substring(-5, 2));

	var str = 'http://www.yandex.ru';
2	if(str.indexOf('yandex.ru') + 1) {
*
**/



/***********************************************************************************************/

/*
<div class="row">
	    <div class="button" data-item="10">Item 10</div>
	    <div class="button" data-item="11">Item 11</div>
	    <div class="button" data-item="12">Item 12</div>
	</div>
	<div class="dropme">
	    <div>List Item 1</div>
	    <div>List Item 2</div>
	    <div>List Item 3</div>
	    <div>List Item 4</div>
	    <div>List Item 5</div>
	</div>
	<br />
	<div class="dropme">
	    <div>List Item 1</div>
	    <div>List Item 2</div>
	    <div>List Item 3</div>
	    <div>List Item 4</div>
	    <div>List Item 5</div>
</div>

	.row {
	    display: block;
	    width: 100%;
	    height: auto;
	}
	.button {
	    display: inline-block;
	    width: auto;
	    height: auto;
	    padding: 8px 15px;
	    border: 1px solid #ccc;
	    text-align: center;
	    background: #eee;
	}
	.dropme {
	    display: inline-block;
	    width: auto;
	    height: auto;
	    overflow: hidden;
	    margin-top: 20px;
	}
	.dropme div {
	    display: block;
	    width: 150px;
	    border: 1px solid #ccc;
	}
	.highlight {
	    padding: 5px;
	    border: 2px dotted #fff09f;
	    background: #fffef5;
	}

	(function ($) {
	    $('.button').draggable({
	        cursor: 'pointer',
	        connectWith: '.dropme',
	        helper: 'clone',
	        opacity: 0.5,
	        zIndex: 10
	    });
	    
	    $('.dropme').sortable({
	        connectWith: '.dropme',
	        cursor: 'pointer'
	    }).droppable({
	        accept: '.button',
	        activeClass: 'highlight',
	        drop: function(event, ui) {
	            var $li = $('<div>').html('List ' + ui.draggable.html());
	            $li.appendTo(this);
	        }
	    });
	}(jQuery));
	
	
	горячая дюжина наиболее распространённых Blue Screen of Death (BSOD ;синий экран смерти):
KMODE_EXCEPTION_NOT_HANDLED ?процесс режима ядра попытался выполнить недопустимую или неизвестную процессорную инструкцию.
Может быть связан с несовместимостью ?железа?, неисправностью оборудования, ошибками в драйвере или системной службе.
NTFS_FILE_SYSTEM ?сбой при выполнении кода драйвера файловой системы ntfs.sys. 
Причиной может являться нарушение целостности данных на диске (сбойный кластер) или в памяти, 
повреждение драйверов IDE или SCSI.
DATA_BUS_ERROR в оперативной памяти обнаружена ошибка чётности. 
Причина ? дефектное или несовместимое оборудование, например ? сбой в микросхеме кэша второго уровня, в видеопамяти. Также может быть связан с некорректно работающим или неверно сконфигурированным драйвером, со сбоем на диске.
IRQL_NOT_LESS_OR_EQUAL процесс режима ядра попытался обратиться к области памяти,
 используя недопустимо высокий для него уровень IRQL (Interrupt Request Level). 
	 Может быть вызван ошибками в драйвере, системной службе, BIOS или несовместимым драйвером, с
 лужбой, программным обеспечением (например ? антивирусом).
PAGE_FAULT_IN_NONPAGED_AREA запрашиваемые данные отсутствуют в памяти (например, система ищет нужные данные в файле подкачки,
 но не находит их). Обычно связан со сбоем оборудования (дефектная память),
 нарушением файловой системы, ошибкой системной службы или антивируса.
KERNEL_STACK_INPAGE_ERROR не удаётся прочитать из файла подкачки в физическую память запрашиваемую страницу памяти.
Причины ? дефектный сектор файла виртуальной памяти, сбой контроллера жёстких дисков, недостаточно места на диске, 
неправильное подключение жёсткого диска, конфликт прерываний, дефект ОЗУ, вирус.
MISMATCHED_HAL уровень аппаратных абстракций (HAL) и ядро системы не соответствуют типу компьютера. 
Чаще всего связан с ситуацией, когда в изначально однопроцессорную систему устанавливают второй процессор,
 забывая вручную обновить HAL и ntoskrnl. Может также быть вызван несовпадением версий hal.dll и ntoskrnl.exe.
KERNEL_DATA_INPAGE_ERROR не удаётся прочитать в физическую память запрашиваемую страницу данных. 
Причины дефектный сектор файла виртуальной памяти, сбой контроллера жёстких дисков, сбой оперативной памяти, вирус,
 сбой дискового контроллера, дефектная оперативная память.
INACCESSIBLE_BOOT_DEVICE в процессе загрузки ОС не смогла получить доступ к системному разделу.
Причин этого распространённого сбоя может быть очень много: дефектный загрузочный диск или дисковый контроллер;
 несовместимость оборудования; загрузочный вирус; ошибка в файловой системе, например ? в таблице разделов Partition Table;
 повреждение или отсутствие необходимого при загрузке файла, например ? NTLDR; 
 отсутствие драйвера контроллера жёстких дисков или несоответствие текущего драйвера установленному оборудованию; включённый в BIOS режим DMA; включённый в CMOS Setup режим смены букв дисководов DRIVE SWAPPING; конфликт распределения ресурсов между дисковым контроллером и другим устройством; повреждение данных о загружаемых драйверах в системном реестре; установка системы в раздел за пределами первых 1024 цилиндров жёсткого диска; ошибка в файле boot.ini.
UNEXPECTED_KERNEL_MODE_TRAP возникновение неподдерживаемой ядром ловушки (trap) или фатальная ошибка (типа деления на ноль).
Неисправность оборудования или сбой программного обеспечения.
STATUS_SYSTEM_PROCESS_TERMINATED ?сбой в службе, работающей в пользовательском режиме. 
Сбой может быть связан с некорректной работой прикладных программ, драйверов, сторонних системных служб.
STATUS_IMAGE_CHECKSUM_MISMATCH повреждён или утерян файл драйвера или системной библиотеки. 
Может быть вызван сбоем файловой системы или случайным удалением системного файл


*/