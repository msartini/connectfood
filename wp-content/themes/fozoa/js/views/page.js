var autores = '';
window.PageView = Backbone.View.extend({
	el: 'body',
	events: {
		'click #formCadastreSe input[type=submit]' : 'validateCadastro',
		'click #formFaleConosco input[type=submit]' : 'validateFaleConosco',
		'click .materials .fancybox-inline' : 'validateFaleComAutor',
		'click .wp-tag-cloud li' : 'triggerLinkA',

		'click #formResetSenha input[type=submit]' : 'validateResetSenha',

		'click #formEditaPerfil input[type=submit]' : 'validateEditaPerfil',

		'click #formContateOAutor input[type=submit]' : 'validateAuthorContact',
		'change #escolha_escola' : 'changeMeuLidi',
		'change .setSchool #estado' : 'getCities',
		'change .setSchool #cidade' : 'getSchools',
		'click #formCadastreSe button' : 'resetCadastro',
		'click .linkEncoded' : 'checkLidiInBrowser',
		'change input[name=videos],input[name=textos]' : 'filterContent', 
		'change #escolaLidi' : 'setEscolaExistente', 
		'click #formAtivarLidi input[type=submit]' : 'submitAtivarLidi'
	},
	initialize: function(){		

		if($('.tabs').length)
			app_view.initTabs();
		
		if($('.faq').length)
			this.initFaq();

		if($('.strongPass').length)
			this.strongPass();

		if($('.setSchool #estado').length)
			this.getStates();

		if($('#escolha_escola').length)
			this.changeMeuLidi();

		if($('.filtros').length)
			this.filterContent();

		// Atribui estilo no thumb do autor na pagina de editorias
		$(".th-editor-edit > img").addClass("img-circle");
		$(".th-editor-edit > img").attr("width", "180");
		$(".th-editor-edit > img").attr("height", "180");
	 
		
		 
	},
	initFaq: function(){
		$('.faq h3').each(function() {
			var tis = $(this), state = false, answer = tis.next('div').hide().css('height','auto').slideUp();
			tis.click(function() {
				state = !state;
				answer.slideToggle(state);
				tis.toggleClass('active',state);
			});
		});
	},
	validateCadastro: function(){
		$("#formCadastreSe").validate({
			onkeyup: false,
			onfocusout: false,
		    rules: {
		        cadastreSe_nome: {
		        	required: true,
		            maxlength: 50
		        },
		        cadastreSe_email: {
		            required: true,
		            email: true,
		            maxlength: 50
		        },
		        cadastreSe_confirmaEmail: {
		        	required: true,
		            email: true,
		            equalTo: "#cadastreSe_email"
		        },
		        cadastreSe_senha: {
		            required: true,
		            maxlength: 15,
		            minlength: 6
		        },
		        cadastreSe_confirmaSenha: {
		            required: true,
		            equalTo: "#cadastreSe_senha",
		            maxlength: 15,
		            minlength: 6
		        },
		        cadastreSe_termos: {
		        	required: true
		        }
		    },
			errorPlacement: function(error, element) {/* no room on page */
				if($(element).attr('id') == 'cadastreSe_termos'){
					$(element).parent().addClass('error')
				}

				if($(element).attr('id') == 'cadastreSe_confirmaSenha')
					if($('#cadastreSe_senha').val() != $('#cadastreSe_confirmaSenha').val())
						$.fancybox( '<div id="respostasModal"><h2>Erro</h2><p>As senhas digitadas não conferem!</p></div>' );

			},
		    submitHandler: function () {
		    	var self = this;

		        var nome = $('#' + this.currentForm.id).find('#cadastreSe_nome').val();
		        var email = $('#' + this.currentForm.id).find('#cadastreSe_email').val();
		        var senha = $('#' + this.currentForm.id).find('#cadastreSe_senha').val();

		        app_view.loader('show');

		        $.ajax({
				  type: "POST",
				  url: "/jornadas/servicos/?method=create",
				  data: { nome: nome, email: email, senha: senha, nascimento: "" },
				  success: function(data){
				  	app_view.loader('hide');
				  	data = $.parseJSON(data);

				  	if( data.error != 'false' ){
				  		$.fancybox( '<div id="respostasModal"><h2>Sucesso</h2><p>' + data.mensagem + '</p></div>' );
				  		app_view.clearFormElements("#formCadastreSe");
				  		$('.password_strength').hide();
				  		$('#cadastreSe_termos').attr("checked","false");
				  	} else {
				  		$.fancybox( '<div id="respostasModal"><h2>Erro</h2><p>' + data.mensagem + '</p></div>' );
				  	}
				  }
				});
		    }
		});
	},
	resetCadastro: function(){
		app_view.clearFormElements("#formCadastreSe");
		return false;
	},
	validateAuthorContact: function(event){

		$("#formContateOAutor").validate({
		    rules: {
		        name: {
		            required: true
		        },
		        email: {
		            required: true,
		            email: true
		        },
		        phone: {
		        	digits: true
		        },
		        description: {
		            required: true
		        }
		    },  
		    submitHandler: function () {
		    	 
		    	autores = autores + $('textarea[name=description]').val();
				$('textarea[name=description]').val( autores );
				$(form).ajaxSubmit();
				
				/*
				name 			= $('#name').val();
				email 			= $('#email').val();
				phone 			= $('#phone').val();
				description 	= $('#description').val();
				
				//INICIO colocar POST AJAX aqui
				
				
				//FIM colocar POST AJAX aqui
				
				
				 
				$('#name').val('');
				$('#phone').val('');
				$('#email').val('');
				$('#description').val('');
				return false;
				//form.submit();
				//$(form).ajaxSubmit();
				*/
				
				  
		    }
		});
		
		
	},
	validateFaleConosco: function(){
		$("#formFaleConosco").validate({
		    rules: {
		        name: {
		        	required: true
		        },
		        email: {
		            required: true,
		            email: true
		        },
		        subject: {
		        	required: true
		        },
		        phone: {
		        	digits: true
		        },
		        description: {
		        	required: true
		        }
		    }
		});
	},
	validateEditaPerfil: function(){
		$("#formEditaPerfil").validate({
		    rules: {
		        nome: {
		        	required: true
		        },
		        newPassword: {
		        	required: false,
		            maxlength: 15,
		            minlength: 6
		        },
		        confirmNewPassword: {
		        	required: false,
		        	equalTo: "#newPassword",
		            maxlength: 15,
		            minlength: 6
		        } 
		    },
			errorPlacement: function(error, element) {/* no room on page */
				if($(element).attr('id') == 'confirmNewPassword')
					if($('#newPassword').val() != $('#confirmNewPassword').val())
						$.fancybox( '<div id="respostasModal"><h2>Erro</h2><p>As senhas digitadas não conferem!</p></div>' );
			}
		});
	},


	validateResetSenha: function(){
		$("#formResetSenha").validate({
		    onkeyup: false,
		    onfocusout: false,
		    rules: {
		        email: {
		            required: true,
		            email: true
		        },
		        newPassword: {
		        	required: true,
		            maxlength: 15,
		            minlength: 6
		        },
		        confirmNewPassword: {
		        	required: true,
		        	equalTo: "#newPassword",
		            maxlength: 15,
		            minlength: 6
		        }
		    },
			errorPlacement: function(error, element) {/* no room on page */
				if($(element).attr('id') == 'confirmNewPassword')
					if($('#newPassword').val() != $('#confirmNewPassword').val())
						$.fancybox( '<div id="respostasModal"><h2>Erro</h2><p>As senhas digitadas não conferem!</p></div>' );
			}
		});
	},
	strongPass: function(){
		$('.strongPass').password_strength();
	},
	changeMeuLidi: function(e){
		var selected = $('#escolha_escola :selected').val();
		$('.tabs').removeClass('active');
		$('#' + selected).addClass('active');
	},
	getStates: function(){
		var self = this;

		$.ajax({
			type: "POST",
			url: "/jornadas/servicos/?method=readstate",
			data: { getEstados: '' },
			beforeSend: function(){
				app_view.loader('show');
			},
			success: function(estados){
				var estados =jQuery.parseJSON( estados ).states;
				app_view.loader('hide');
				self.populateStates(estados);
			}
		});
	},
	populateStates: function(estados){
		var options = '<option value="" selected="selected">--</option>';
		
		for( var i = 0; i < estados.length; i++ ){
			var option = '<option value="' + estados[i].id + '">' + estados[i].sigla + '</option>';

			options += option;
		}

		$('.setSchool #estado').append(options);
	},
	getCities: function(){
		this.resetCity();
		this.resetSchool();

		var self = this;

		var stateID = $('.setSchool #estado').val();

		$.ajax({
			type: "POST",
			url: "/jornadas/servicos/?method=readcity",
			data: { id: stateID },
			beforeSend: function(){
				app_view.loader('show');
			},
			success: function(cidades){
				$('.setSchool #cidade').empty();

				var cidades = jQuery.parseJSON( cidades ).cities;
				
				if(!$.isArray(cidades))
					cidades = new Array(cidades);

				app_view.loader('hide');
				self.populateCities(cidades);
			}
		});
	},
	populateCities: function(cidades){
		var options = '<option value="" selected="selected">--</option>';
		
		for( var i = 0; i < cidades.length; i++ ){
			var option = '<option value="' + cidades[i].id + '">' + cidades[i].name + '</option>';

			options += option;
		}

		$('.setSchool #cidade').append(options);
		$('.setSchool #cidade').removeAttr('disabled');
	},
	getSchools: function(){
		this.resetSchool();
		
		var self = this;

		var state = $('.setSchool #estado option:selected').text();
		var city = $('.setSchool #cidade option:selected').text();
                

		$.ajax({
			type: "POST",
			url: "/jornadas/servicos/?method=readschool",
			data: { graduationLevelID: 6, state: state, city: city },
			beforeSend: function(){
				app_view.loader('show');
			},
			success: function(escolas){
                             
				if(escolas.indexOf('{"schools":[]}') < 0){
					var escolas = jQuery.parseJSON( escolas ).schools;

					if(!$.isArray(escolas))
						escolas = new Array(escolas);

					app_view.loader('hide');
					self.populateSchools(escolas);
				} else {
					app_view.loader('hide');
					$.fancybox( '<div id="respostasModal"><h2>Erro</h2><p>Essa cidade não contém escolas. Selecione outra cidade.</p></div>' );
				}
			}
		});
	},
	populateSchools: function(escolas){
		var schools = escolas;
		var schoolsName = [];
		
		for( var i = 0; i < escolas.length; i++ ) {
			schoolsName.push(escolas[i].name + ' - ' + escolas[i].neighborhood + ' - ' + escolas[i].idLegado);
		}
			

		this.initEscolasAutocomplete(schoolsName, schools);
	},
	initEscolasAutocomplete: function(schoolsName, schools){
		var self = this;

		$( "#escolasAutocomplete" ).autocomplete({
			source: schoolsName,
			minLength: 1,
			select: function( event, ui ) {
				$( "#escolasAutocomplete" ).val(self.findSchoolId(schools, ui.item.label)[0].name);

				$( "#idEscola" ).val(self.findSchoolId(schools, ui.item.label)[0].idSchool);

            	return false;
            },
            focus: function( event, ui ) {
				$( "#escolasAutocomplete" ).val(self.findSchoolId(schools, ui.item.label)[0].name);

				$( "#idEscola" ).val(self.findSchoolId(schools, ui.item.label)[0].idSchool);

            	return false;
            }
		}).data( "autocomplete" )._renderItem = function( ul, item ) {
            return $( "<li>" )
                .data( "item.autocomplete", item )
                .append( "<a>" + item.label +  "</a>" )
                .appendTo( ul );
        };

		$( "#escolasAutocomplete" ).removeAttr('disabled');
	},
	findSchoolId: function(schools, schoolName){
	    return $.grep(schools, function(item){
                name = item.name + ' - ' + item.neighborhood + ' - ' + item.idLegado; 
                return name == schoolName;
	    });
	},
	resetCity: function(){
		$('.setSchool #cidade').attr('disabled', 'disabled');
	},
	resetSchool: function(){
		$( "#escolasAutocomplete" ).attr('disabled', 'disabled');
		$( "#escolasAutocomplete" ).val('');
		$( "#idEscola" ).val('');
	},
	checkLidiInBrowser: function(){
		var isMobile = {
            Android: function() {
                return navigator.userAgent.match(/Android/i);
            },
            BlackBerry: function() {
                return navigator.userAgent.match(/BlackBerry/i);
            },
            iOS: function() {
                return navigator.userAgent.match(/iPhone|iPad|iPod/i);
            },
            Opera: function() {
                return navigator.userAgent.match(/Opera Mini/i);
            },
            Windows: function() {
                return navigator.userAgent.match(/IEMobile/i);
            },
            any: function() {
                return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
            }
        };

        if(isMobile.any()) {
           $.fancybox( '<div id="respostasModal"><h2>Informação</h2><p>O LIDi - Livro Interativo Digital não está disponível para esse tipo de equipamento. <br /><br />Dúvidas, entre em contato com o SAC <br /> pelo telefone: 0800-00117875, <br />de 2ª a 6ª das 08:30 às 19h30, <br />ou pelo e-mail <a href="mailto:saceditorasaraiva@editorasaraiva.com.br">saceditorasaraiva@editorasaraiva.com.br</a>.</p></div>' );
           return false;
        }
	},
	filterContent: function(event) {
		if(event){
			var target = $(event.currentTarget).val(); 
			var checked = $(event.currentTarget).attr('checked');
		
			this.displayFilteredContent(checked, target);
		} else {
			var checkboxes = $('.filtros input[type=checkbox]');

			for(var i = 0; i < checkboxes.length; i++){
				var checkbox = checkboxes[i];

				var target = $(checkbox).val(); 
				var checked = $(checkbox).attr('checked');

				this.displayFilteredContent(checked, target);
			}
		}
	},
	displayFilteredContent: function(checked, target){
		if(checked == "checked")
			$('.loopApoio .' + target).show();
		else
			$('.loopApoio .' + target).hide();
	}, 
	setEscolaExistente: function(){
		 
		idEscola = $('#escolaLidi').val();
		 
		if ( idEscola > '0'){
			$('#selectCidade').css('display', 'none');
			$('#selectEstado').css('display', 'none');
		} else {
			$('#selectCidade').css('display', 'block');
			$('#selectEstado').css('display', 'block');
		}

		$('#idEscola').val( idEscola );
		$('#escolasAutocomplete').val(  $("#escolaLidi option:selected").text()  );
		 
	}, 
	submitAtivarLidi: function(){
		//$('#selectCidade').css('display', 'block');
		//$('#selectEstado').css('display', 'block');
		$('#escolasAutocomplete').removeAttr('disabled');
	},
	validateFaleComAutor: function(event){
		
		$el = $(event.target);
		autores = $el.attr('rel');
		 
	}, 
	triggerLinkA: function(event){

		$el = $(event.target);
		$link = $el.find('a');
		document.location =  $link.attr('href');
		
	}
});