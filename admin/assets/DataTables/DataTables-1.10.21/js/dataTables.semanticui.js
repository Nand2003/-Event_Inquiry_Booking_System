
(function( factory ){
	if ( typeof define === 'function' && define.amd ) {
		
		define( ['jquery', 'datatables.net'], function ( $ ) {
			return factory( $, window, document );
		} );
	}
	else if ( typeof exports === 'object' ) {
		
		module.exports = function (root, $) {
			if ( ! root ) {
				root = window;
			}

			if ( ! $ || ! $.fn.dataTable ) {
				
				$ = require('datatables.net')(root, $).$;
			}

			return factory( $, root, root.document );
		};
	}
	else {
		
		factory( jQuery, window, document );
	}
}(function( $, window, document, undefined ) {
'use strict';
var DataTable = $.fn.dataTable;



$.extend( true, DataTable.defaults, {
	dom:
		"<'ui stackable grid'"+
			"<'row'"+
				"<'eight wide column'l>"+
				"<'right aligned eight wide column'f>"+
			">"+
			"<'row dt-table'"+
				"<'sixteen wide column'tr>"+
			">"+
			"<'row'"+
				"<'seven wide column'i>"+
				"<'right aligned nine wide column'p>"+
			">"+
		">",
	renderer: 'semanticUI'
} );



$.extend( DataTable.ext.classes, {
	sWrapper:      "dataTables_wrapper dt-semanticUI",
	sFilter:       "dataTables_filter ui input",
	sProcessing:   "dataTables_processing ui segment",
	sPageButton:   "paginate_button item"
} );



DataTable.ext.renderer.pageButton.semanticUI = function ( settings, host, idx, buttons, page, pages ) {
	var api     = new DataTable.Api( settings );
	var classes = settings.oClasses;
	var lang    = settings.oLanguage.oPaginate;
	var aria = settings.oLanguage.oAria.paginate || {};
	var btnDisplay, btnClass, counter=0;

	var attach = function( container, buttons ) {
		var i, ien, node, button;
		var clickHandler = function ( e ) {
			e.preventDefault();
			if ( !$(e.currentTarget).hasClass('disabled') && api.page() != e.data.action ) {
				api.page( e.data.action ).draw( 'page' );
			}
		};

		for ( i=0, ien=buttons.length ; i<ien ; i++ ) {
			button = buttons[i];

			if ( $.isArray( button ) ) {
				attach( container, button );
			}
			else {
				btnDisplay = '';
				btnClass = '';

				switch ( button ) {
					case 'ellipsis':
						btnDisplay = '&#x2026;';
						btnClass = 'disabled';
						break;

					case 'first':
						btnDisplay = lang.sFirst;
						btnClass = button + (page > 0 ?
							'' : ' disabled');
						break;

					case 'previous':
						btnDisplay = lang.sPrevious;
						btnClass = button + (page > 0 ?
							'' : ' disabled');
						break;

					case 'next':
						btnDisplay = lang.sNext;
						btnClass = button + (page < pages-1 ?
							'' : ' disabled');
						break;

					case 'last':
						btnDisplay = lang.sLast;
						btnClass = button + (page < pages-1 ?
							'' : ' disabled');
						break;

					default:
						btnDisplay = button + 1;
						btnClass = page === button ?
							'active' : '';
						break;
				}

				var tag = btnClass.indexOf( 'disabled' ) === -1 ?
					'a' :
					'div';

				if ( btnDisplay ) {
					node = $('<'+tag+'>', {
							'class': classes.sPageButton+' '+btnClass,
							'id': idx === 0 && typeof button === 'string' ?
								settings.sTableId +'_'+ button :
								null,
							'href': '#',
							'aria-controls': settings.sTableId,
							'aria-label': aria[ button ],
							'data-dt-idx': counter,
							'tabindex': settings.iTabIndex
						} )
						.html( btnDisplay )
						.appendTo( container );

					settings.oApi._fnBindAction(
						node, {action: button}, clickHandler
					);

					counter++;
				}
			}
		}
	};

	
	var activeEl;

	try {
		
		activeEl = $(host).find(document.activeElement).data('dt-idx');
	}
	catch (e) {}

	attach(
		$(host).empty().html('<div class="ui stackable pagination menu"/>').children(),
		buttons
	);

	if ( activeEl !== undefined ) {
		$(host).find( '[data-dt-idx='+activeEl+']' ).trigger('focus');
	}
};



$(document).on( 'init.dt', function (e, ctx) {
	if ( e.namespace !== 'dt' ) {
		return;
	}

	var api = new $.fn.dataTable.Api( ctx );

	
	if ( $.fn.dropdown ) {
		$( 'div.dataTables_length select', api.table().container() ).dropdown();
	}

	
	$( 'div.dataTables_filter.ui.input', api.table().container() ).removeClass('input').addClass('form');
	$( 'div.dataTables_filter input', api.table().container() ).wrap( '<span class="ui input" />' );
} );


return DataTable;
}));
