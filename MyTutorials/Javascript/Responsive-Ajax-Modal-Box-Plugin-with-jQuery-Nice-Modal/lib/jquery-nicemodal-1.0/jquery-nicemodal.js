(function($){

    var settings, overlay, modal, wrapModalContent, closeButton, htmlDefaultOverflow;

    var methods = {
        init : function(options) {
            defaults = {
                    
                    width: '600px',
                    height: 'auto',
                    idToClose: '#close-nicemodal',
                    defaultCloseButton: true,
                    keyCodeToClose: 27,
                    closeOnClickOverlay: true,
                    closeOnDblClickOverlay: false,
                    fadeSpeed: 'fast',
                    onOpenModal: function(){},
                    onCloseModal: function(){},
                };

            settings = $.extend( {}, defaults, options );

            console.log('XD');

            var $this =  $(this);

            $this.click(function(){
                var url;
                // Ve se é A ou button
                if ($(this).prop('tagName') == 'A') {
                    url = $(this).attr('href');
                } else {
                    url = $(this).attr('data-url');
                };
                // Abre a janela modal passando a url a ser aberta
                methods.openModal(url);
                return false;
            });

        },
        fitModal: function(){
            //Pega largura da tela
            var wW = $(window).width();
            // Se a largura da janela modal for maior que a tela ela vira responsiva
            if (parseInt(settings.width, 10) >= wW) {
                modal
                    .css({
                        'width': '94%',
                        'height': 'auto',
                        'left': 0,
                        'top': 0,
                        'margin-top': '3%',
                        'margin-left': '3%'
                    });
            } else {        
                modal
                    .css(
                        {
                            width: settings.width,
                            height: settings.height,
                            'margin-top': '20px',
                            'margin-bottom': '20px'
                        }
                    );
                methods.centerModal();
            };
        },
        // Este método serve apenas para centralizar janelas fixas e nao responsivas
        centerModal: function(){
            var ml = (modal.width() / 2);
            modal.css({'margin-left': -ml, 'left': '50%'});
        },
        fitOverlay: function(){
            // Deixa o overlay com a largura e altura da janela do browser, como ela nao tem rolagem
            // Sempre vai pegar tudo
            var wW = $(window).width();
            var wH = $(window).height();
            overlay.css({width: wW, height: wH});
        },
        openModal: function(url, options){
            // Se ele passar segundo argumento quer dizer que ele está abrindo direto
            if (typeof options != 'undefined') {
                settings = $.extend( {}, settings, options );
            };
            // console.log(settings);
            /****** IMPORTANTE *********/
            // Deve tirar o scroll do html antes de pegar o tamanho da tela 
            // e usar o fit overlay, senao ele pega o tamanho da tela errado descontando o scroll

            // Retira o scroll do html para nao bugar o overlay nem a janela modal
            htmlDefaultOverflow = $('html').css('overflow-y');
            $('html').css({overflow: 'hidden'});
            
            overlay = $('<div/>')
                .addClass('nicemodal-overlay')
                .appendTo('body');
            methods.fitOverlay();
            
            modal = $('<div/>')
                .addClass('nicemodal-window')
                .appendTo(overlay);
            methods.fitModal();
            
            // Só insere o botao fechar se a opção for true
            if (settings.defaultCloseButton) {
                closeButton = $('<div/>')
                    .addClass('nicemodal-close-button')
                    .appendTo(modal);
                closeButton.click(function(){
                    methods.closeModal();
                });
            };
            
            // O conteudo que será carrega vai dentro deste div que é inserida na janela modal
            wrapModalContent = $('<div/>').addClass('nicemodal-wrap-modal-content').appendTo(modal);
            
            // Se a opção for true ele fecha a janela com click na overlay
            if (settings.closeOnClickOverlay) {                
                overlay.click(function(){
                    methods.closeModal();
                });
            };
            // Se a opção for true ele fecha a janela com double click na overlay
            if (settings.closeOnDblClickOverlay) {             
                overlay.dblclick(function(){
                    methods.closeModal();
                });
            };
            
            // Inserindo o evento de fechar a modal para todos os elementos que tiverem o id conforme especificado
            // nas opções
            wrapModalContent.on('click',settings.idToClose, function(){
                methods.closeModal();
                $(this).off('click', settings.idToClose);
                return false;
            });
            // Ajusta overlay e modal conforme redimensiona janela
            $(window).on('resize', function(){
                methods.fitOverlay();
                methods.fitModal();
            });
            // Coloca o stop propagation pq se clica na janela ele detecna o click no overlay tb e fecha a janela.
            modal.on("click", function(e){
                e.stopPropagation();
            });
            // Seta o evento de fechar a modal com o keycode passado nas opções
            $(document).on('keyup', function(key){
                if (key.which == settings.keyCodeToClose) {
                    methods.closeModal();
                };
            });
            
            // Faz o fadein do overlay e quando acaba faz o fadein da janela modal
            overlay.fadeIn(function(){
                overlay.css({'overflow-y': 'auto'});
                modal.fadeIn();
            });
            //Faz o load do conteudo com a url passada por parametro e faz o fadeIn dela quando terminar
            // Tb tira o bg de loader da janela modal e dispara o evento onOpenModal
            wrapModalContent.load(url, function(response, status, xhr){
                $(this).fadeIn(function(){ 
                    modal.css({'background-image': 'none'});
                    switch (xhr.status){
                        case 200:
                            break;
                        case 404:
                            methods.loadError('Erro 404: A página requisitada não foi encontrada.');
                            break;
                        case 500:
                            methods.loadError('Erro 500: Página requisitada contém erros.');
                            break;
                        default:
                            methods.loadError('Erro: ' + xhr.status);
                            break;
                    };
                    settings.onOpenModal.call();
                });
            });
        },
        closeModal: function () {
            // Remove os eventos colocados com .on quando abriu
            modal.off("click");
            $(window).off('resize');
            $(document).off('keyup');
            
            //Faz isso pra manter o scroll é nao dar um efeito estranho
            if (overlay.height() < modal.height()) {
                overlay.css({'overflow-y': 'scroll'});
            };
            
            // Anima a janela modal ateh ele sumir da tela puxando pra cima,
            modal.animate({top: 0, 'margin-top': -(modal.height()) +'px'}, function(){
                // Fadeout no overlay depois da janela modal subir
                overlay.fadeOut(function(){
                    // Volta com o scroll do html como era antes
                    $('html').css({'overflow-y': htmlDefaultOverflow});
                    //Destroi as divs criadas
                    wrapModalContent.remove();
                    modal.remove();
                    overlay.remove();
                    // chama evento onCloseModal
                    settings.onCloseModal.call();
                });
            });
        },
        loadError: function(msg){
            var alertMessage = $('<div/>').addClass('nicemodal-alert-message').text(msg);
            alertMessage.appendTo(wrapModalContent);
        }
    };

$.fn.nicemodal = function(methodOrOptions) {
    if ( methods[methodOrOptions] ) {
        return methods[ methodOrOptions ].apply( this, Array.prototype.slice.call( arguments, 1 ));
    } else if ( typeof methodOrOptions === 'object' || ! methodOrOptions ) {
        // Default to "init"
        return methods.init.apply( this, arguments );
    } else {
        $.error( 'Method ' +  methodOrOptions + ' does not exist on jQuery.pluginName' );
    }    
};
})(jQuery);