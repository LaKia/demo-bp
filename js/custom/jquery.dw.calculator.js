(function($, undefined){

	var buttons = [
	       		{ label: 'MR' },
	       		{ label: 'MS' },
	       		{ label: 'MC' },
	       		{ label: 'Clear', classname: 'dw-calculator-clear dw-calculator-clearfix', action: 'clear' },
	       		{ label: 'CE', action: 'clearEntry' },
	       		{ label: '*', classname: 'dw-calculator-times', action: 'operator' },
	       		{ label: 7, classname: 'dw-calculator-clearfix', action: 'number' },
	       		{ label: 8, action: 'number' },
	       		{ label: 9, action: 'number' },
	       		{ label: '+', classname: 'dw-calculator-plus', action: 'operator' },
	       		{ label: 4, classname: 'dw-calculator-clearfix', action: 'number' },
	       		{ label: 5, action: 'number' },
	       		{ label: 6, action: 'number' },
	       		{ label: '-', classname: 'dw-calculator-minus', action: 'operator' },
	       		{ label: 1, classname: 'dw-calculator-clearfix', action: 'number' },
	       		{ label: 2, action: 'number' },
	       		{ label: 3, action: 'number' },
	       		{ label: '/', classname: 'dw-calculator-divide', action: 'operator' },
	       		{ label: 0, classname: 'dw-calculator-clearfix dw-calculator-wide', action: 'number' },
	       		{ label: '.', classname: 'dw-calculator-dot', action: 'dot' },
	       		{ label: '=', classname: 'dw-calculator-equals', action: 'equals' }
	       	];
	//extend ui.button -> da console si vedono i parametri relativi a button(label,icons, ecc) nelle opziioni in prototype.
	/*$.widget('dw.calculator', $.ui.button,{
		version:'0.0.1'
	});*/

	$.widget('dw.calculator',{
		version:'0.0.1',
		/* aggiungere opzioni configurabili = 1 */
		options: {
			buttons: buttons,
			showOnCreate: false,
			show:false,
			hide:false,
			beforeAddButton:null,
			shown:null,
			hidden:null,
		},

		_create: function(){
			this.element.addClass('dw-calculator');
			this._createWrapper();
			this._createButtons();
			this._renderMurkup();

			//console.log(this.options);
		},

		_createWrapper: function(){
			var el = $('<div/>'),
			widget = this,
			displays;

			this.shell = el.clone().addClass('dw-calculator-shell');
			displays = el.clone().addClass('dw-calculator-displays').appendTo(this.shell);
			el.clone().addClass('dw-calcolator-calculation').appendTo(displays);
			el.clone().addClass('dw-calculator-display').appendTo(displays);

			if (!this.options.showOnCreate){
				this._hide(this.element, this.options.hide, function(){
					widget._trigger('hidden');
				});

			}
		},

		_createButtons: function(){
			var el = $('<button/>'),
			container = $('<div/>').addClass('ui-helper-clearfix'),
			widget = this;

			$.each(this.options.buttons, function (i, button) {
				if (widget._trigger('beforeAddButton', null, button)) {
					var btn = el.clone().text(button.label).appendTo(container).button();
					if (!!button.classname) {
						btn.addClass(button.classname);
					}
				}
			});

			container.appendTo(this.shell);
		},

		_renderMurkup: function (){
			this.shell.appendTo(this.element);
		},

		_setOptions: function (options){
			this._superApply(arguments);
		},

		_setOption: function (key, val){
			this._super(key, val);

			if (key === 'buttons'){
				this.shell.find('button').remove();
				this._createButtons();
				this._renderMurkup();
			}
			else if (key === 'disabled'){
				this.shell.find('button').button('option', key, val);
			}
		},
		_destroy: function (){
			this.element.removeClass('dw-calculator');
			this.element.empty();
		},

		show: function(){
			var widget= this;
			this._show(this.element, this.option.show, function(){
				widget._trigger ('shown');
			});

		}

	});
}(jQuery));