// Bootstrap Datepicker
$(function(){
    $(document.body).on('requestChange', function(){
    	$('.datepicker').datepicker({
	        format : 'yyyy-mm-dd',
	        weekStart : 6,
	        autoclose: true,
	        todayBtn: 'linked'
	    });
    });
    $(document.body).trigger('requestChange');
});

//DataTable
$(document).ready(function(){
    $('.sortable').each(function(){
    	var $this = $(this);
    	if($this.find('tbody').length > 1){
    		$this.DataTable();
    	}
    });
});

//Add More
$(function(){
	var i = 1000;
	$('.more').click(function(){
		var $this = $(this);
		var $container = $this.data('container');
		var $tmpl = $($this.data('tmpl'));


		var obj = $tmpl.tmpl({i : ++i});
		if($this.hasClass('more-table')){
			$this.closest('tr').before(obj);
		}else{
			obj.appendTo($container);
		}

		if($this.hasClass('more-dsi')){
			dsi(obj);
		}

		$(document.body).trigger('requestChange');
	});

	$(document.body).on('click', '.more-remove', function(){
		$(this).parent().parent().remove();
	})
});

// Selectors
$(function(){
	$('.selector').each(function(){
		var $this = $(this);
		var $target = $($this.data('target'));

		$this.change(function(){
			$target.each(function(){
				var $select = $(this);
				fillSelect($select, $select.data('url') + '/' + $this.val());
			});
			
		});
		if($this.val()){
			$this.change();
		}
	});
});

// DSI
$(function(){
	$('.dsi').each(function(){
		dsi($(this));
	});

	$(document).on('click', '.dsi .delete', function(e){
		e.preventDefault();
		var $this = $(this);
		$this.closest('tr').remove();
		return false;
	});
});

var fillSelect = function($select, url){
	$select.html('<option>Loading ...</option>');
	$.ajax({
		url: url,
		type: 'get',
		dataType: 'json'
	}).success(function(data){
		$select.html('<option>-- SELECT --</option>');
		$.each(data, function(){
			$select.append('<option value="' + this.key + '">' + this.value + '</option>');
		});

		if($select.data('val')){
			$select.val($select.data('val'));
			if($select.data('val') == $select.val()){
				$select.removeAttr('data-val');
				$select.change();
			}
		}
	});
};

//Tabs
$(function(){
	var hash = window.location.hash;
	$links = $('.tabs .nav a');

	$links.click(function(){
		var $this = $(this);
		if($this.parent().hasClass('disabled')) return false;
		window.location.hash = $this.attr('href');
	});

	if(hash){
		$links.filter('.' + hash.substr(1)).tab('show');
	}
});

// Expandable
$(function(){
	$('.expandable').each(function(){
		var $this = $(this);
		var $target = $($this.data('target'));
		var $items  = $target.find('li');
		
		$this.change(function(){
			$items.css('display: block');
			$items.slideUp();
			if($this.val()){
				$items.filter('#' + $this.val()).slideDown();
			}
		});

		$this.change();
	});
});


function dsi($this){
	var $divisions = $this.find('#divisions');
	var $sections = $this.find('#sections');
	var $items = $this.find('#items');

	fillSelect($divisions, $divisions.data('url'));
	
	$divisions.change(function(){
		fillSelect($sections, $sections.data('url') + '/' + $divisions.val());
	});

	$sections.change(function(){
		fillSelect($items, $items.data('url') + '/' + $divisions.val() + '/' + $sections.val());
	});
}