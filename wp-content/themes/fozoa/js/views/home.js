window.HomeView = Backbone.View.extend({
	el: 'body',
	events: {
		'click .abre-events' : 'validateCadastro'
	},
	initialize: function(){

	}, 
	validateCadastro: function() {
				alert('teste');
				return false;
	}
});