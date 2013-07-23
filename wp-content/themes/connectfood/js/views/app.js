window.AppView = Backbone.View.extend({
	el: 'body',
	events: {
		'click .formLogin input[type=submit]' : 'validateLogin',
		'click #formEsqueceuSenha input[type=submit]' : 'validateEsqueceuSenha',
		'click #formAtivarLidi input[type=submit]' : 'validateAtivarLidi',
		'click #btLogout' : 'showLogoutLoader'
	},
	initialize: function(){ 
		//desabilitado fancybox
		//this.initFancybox();

		if(window.location.hash == '#enviado')
			this.renderFancyboxMsg();
	},
	initFancybox: function(){
		var self = this; 

		$('.fancybox-media')
			.fancybox({
				openEffect : 'none',
				closeEffect : 'none',
				padding		: 0,
				arrows : false,
				helpers : {
					media : {},
				}
		});

		$(".fancybox-inline").fancybox({
			fitToView	: true,
			padding		: 2,
			autoSize	: true,
			closeClick	: false,
			openEffect	: 'fade',
			closeEffect	: 'fade',
			afterClose: function() {
				self.loader('hide');
			}
		});

		$(".fancybox-iframe-link").fancybox({
			maxWidth	: 800,
			maxHeight	: 700,
			width		: 800,
			height		: 700,
			autoSize	: false,
			closeClick	: false,
			openEffect	: 'none',
			closeEffect	: 'none',
			padding		: 0
		});
	},
	initTabs: function(){
		$('.tabs').tabs();
	},
	pageIdToBody: function(slug){
		//Rotina antiga desativada
		//slug = this.cleanSlugs(slug);
		//slug = (slug=='')?'homePage':slug
		//$('body').attr('id', slug)
		///////ROTINA NOVA ////  ex: quem-somos/missao  , irá passar quem-somos missao , como classe do BODY
		//adiciona a url como classe do BODY
		$('body').addClass(slug);
	},
	activateMenu: function(fragment){
		if(fragment)
			$(".mainMenu a[href$='"+ fragment +"']").addClass('active');
		else
			$(".mainMenu li.first a").addClass('active');
	},
	validateLogin: function(){
		$("#formLogin").validate({
		    rules: {
		        login_email: {
		            required: true,
		            email: true
		        },
		        login_senha: {
		            required: true
		        }
		    },
		    submitHandler: function () {
		    	app_view.loader('show');
		    	
		        var email = $('#' + this.currentForm.id).find('#login_email').val();
		        var senha = $('#' + this.currentForm.id).find('#login_senha').val();
		    	
		        $.ajax({
				  type: "POST",
				  url: "/jornadas/servicos/?method=authenticate",
				  data: { email: email, senha: senha },
				  success: function(data){
					  var result = jQuery.parseJSON(data);
					  if(result.erro == "true")
						  $.fancybox( '<div id="respostasModal"><h2>Erro</h2><p>' +result.message + '</p></div>' );
					  else
						  window.location = result.url;
				  
					  app_view.loader('hide');
				  }
				});
		    }
		});
	},
	validateEsqueceuSenha: function(){
		$("#formEsqueceuSenha").validate({
		    rules: {
		        esqueceuSenha_email: {
		            required: true,
		            email: true
		        }
		    },
		    submitHandler: function () {
		    	  app_view.loader('show');

		    	  var email = $('#' + this.currentForm.id).find('#esqueceuSenha_email').val();
		    	  
		    	  $.ajax({
					  type: "POST",
					  url: "/jornadas/servicos/?method=readactivationcode",
					  data: { email: email },
					  success: function(data){
					  	  app_view.loader('hide');
					  	  app_view.clearFormElements("#formEsqueceuSenha");
						  $.fancybox( '<div id="respostasModal"><h2>Sucesso</h2><p>' + data + '</p></div>' );
						  return false;
					  }
					});
		    	 
		    }
		});
	},
	validateAtivarLidi: function(){
		$("#formAtivarLidi").validate({
		    rules: {
		        ativarLidi_email: {
		            required: true,
		            email: true
		        },
		        ativarLidi_senha: {
		            required: true
		        }
		    },
		    submitHandler: function () {
		    	app_view.loader('show');
		    	
		        var email = $('#' + this.currentForm.id).find('#ativarLidi_email').val();
		        var senha = $('#' + this.currentForm.id).find('#ativarLidi_senha').val();
		    	
		        $.ajax({
				  type: "POST",
				  url: "/jornadas/servicos/?method=authenticate",
				  data: { email: email, senha: senha },
				  success: function(data){
					  var result = jQuery.parseJSON(data);
					  if(result.erro == "true")
						  $.fancybox( '<div id="respostasModal"><h2>Erro</h2><p>' +result.message + '</p></div>' );
					  else
						  window.location = result.url;
				  
					  app_view.loader('hide');
				  }
				});
		    }
		});
	},
	 
	showLogoutLoader: function(){
		app_view.loader('show');
	},
	loader: function(usage){
		if(usage == 'show')
			$('#loader').fadeIn('fast');
		else if(usage == 'hide')
			$('#loader').fadeOut('fast');
	},
	clearFormElements: function(ele) {
	    $(ele).find(':input').each(function() {
	        switch(this.type) {
	            case 'password':
	            case 'select-multiple':
	            case 'select-one':
	            case 'text':
	            case 'textarea':
	                $(this).val('');
	                break;
	            case 'checkbox':
	            case 'radio':
	                this.checked = false;
	        }
	    });
	},
	renderFancyboxMsg: function(){
		$.fancybox( '<div id="respostasModal"><h2>Sucesso</h2><p>Sua mensagem foi enviada com sucesso!!!</p></div>' );
	},
	goToLidi: function(e){
		var link = e.currentTarget.id;

		$.ajax({
			type: "GET",
			url: "http://lidi.editorasaraiva.com.br/AuthLidi/" + link,
			beforeSend: function(xhrObj){
                xhrObj.setRequestHeader("Content-Type","application/text");
                xhrObj.setRequestHeader("Accept","/");
                xhrObj.setRequestHeader("idApplication","GBHN759KJHS7643JKSL0976FAJSL");
			},
			success: function(data){
				console.log(data);
			}
		});
	},
	cleanSlugs: function(slug){
		var slug = slug.replace('/', '');
		slug = slug.split('?');
		
		return slug[0];
	}
});