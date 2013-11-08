if( typeof Object.create !== 'function'){
		Object.create = function( obj ){
			function F(){};
			F.prototype = obj;
			return new F();
	};
}
(function($,window, document, undefined){ //best practices include plugin in a function.
	var Prova = {
			init: function( options, elem ){
				var self = this;
				//this.prop = 'value';
				self.elem=elem;
				self.$elem = $( elem );

				self.url = 'test.php';

				if(typeof options === 'string'){
					self.search = options;
				}
				else{//è un oggetto
					self.search = options.search;
					//jquery extend object

				}

				self.options = $.extend({}, $.fn.queryProva.options, options);
				//options(dogs) va a sovrascrivere la ricerca di default.
				console.log(self.options);
				self.cycle();
			},
			//metodo che prepara l'output per ogni item
			cycle: function(){
				var self = this;
				self.fetch().done(function( result ){
					self.buildFrag();
					self.display();
				});
			},
			//metodo che fa la chiamata alle api e da in output un json con i risultati
			fetch: function(){
				return $.ajax({
						url: this.url,
						data:{q: this.search },
						dataType:'jsonp'
					});
			},

			//metodo che costruisce l'html di un item
			buildFrag: function(results){
				var self = this;
				self.tweets = $.map ( results.results, function(obj, i){
					//console.log(obj);
					return obj.text;
				});
				console.log( self.tweets );
			},

			display: function(){
				this.$elem.html( self.tweets );
			}
	};

	$.fn.queryProva = function( options ){
		console.log('called');
		return this.each(function(){
			//console.log($(this).attr('data-es'));
			//console.log(Prova);//oggetto con proprietà
			var prova = Object.create( Prova );
			//console.log(prova);//istanza dell'oggetto
			prova.init( options,this );
			//console.log(prova);//con prop: value
		});
	};

	$.fn.queryProva.options = {
		search:'@tutspremium'
	};
})(jQuery, window, document);