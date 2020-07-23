(function ($) {
    $.fn.orgChart = function (options) {
        var opts = $.extend({}, $.fn.orgChart.defaults, options);
        return new OrgChart($(this), opts);
    }

    $.fn.orgChart.defaults = {
        data: [{
            id: 1,
            name: 'Clique aqui para adicionar a OM pai',
            sigla: 'Pai',
            cor: '#000000',
            parent: 0,
            podeVerTudo: false
        }],
        showControls: false,
        allowEdit: true,
        onAddNode: null,
        onDeleteNode: null,
        onClickNode: null,
        newNodeText: 'Adicione uma Om subordinada'
    };

    function OrgChart($container, opts) {
        var data = opts.data;
        var nodes = {};
        var rootNodes = [];
        this.opts = opts;
        this.$container = $container;
        var self = this;
        var finalColor = '';


        var dadoInicial = [];


        this.draw = function () {

            $container.empty().append(rootNodes[0].render(opts));

            $container.find('.node').click(function () {
                if (self.opts.onClickNode !== null) {
                    self.opts.onClickNode(nodes[$(this).attr('node-id')]);
                }
            });

            // botão para editar
            if (opts.allowEdit) {
                $container.find('.node .org-edit-button').click(function (e) {
                    var thisId = $(this).parent().attr('node-id');

                    self.startEdit(thisId);
                    e.stopPropagation();
                });
            }

            // add "add button" listener
            $container.find('.org-add-button').click(function (e) {
                var thisId = $(this).parent().attr('node-id');

                if (self.opts.onAddNode !== null) {
                    self.opts.onAddNode(nodes[thisId]);
                } else {
                    self.newNode(thisId);
                }
                e.stopPropagation();
            });

            // click btn del
            $container.find('.org-del-button').click(function (e) {
                var thisId = $(this).parent().attr('node-id');


                if (self.opts.onDeleteNode !== null) {
                    self.opts.onDeleteNode(nodes[thisId]);
                } else {
                    self.deleteNode(thisId);
                }
                e.stopPropagation();
            });
        }

        this.startEdit = function (id) {

            // pega o valor inicial de nome
            var nomeInicial = $('#nameElement_' + id + ' h2').text();

            // pega o valor inicial de sigla
            var siglaInicial = $('#siglaElement_' + id + ' h6').text();

            // cria a variável que vai armazenar a cor inicial do elemento
            const initialColor =  rgb2hex($container.find('#colorSpace_' + id).css('background-color'));

            // verifica o pode ver tudo inicial
            const podeVerTudoInicial = $('#podeVerTudo_'+id).is(':checked');

            // verifica se é pef inicial
            const ePefInicial = $('#ePef_'+id).is(':checked');

            // adicina a arrai de controle
            dadoInicial.push(nomeInicial, siglaInicial, initialColor, podeVerTudoInicial, ePefInicial);


            //input para o nome da OM
            var inputElement = $('<label for="nomeOm_' + nodes[id].data.id + '">Nome da Om</label>' +
                '<input autofocus id="nomeOm_' + nodes[id].data.id + '" placeholder="Digite o nome da Om" ' +
                'class="org-input" type="text" value="' + nomeInicial + '">');

            // input para a sigla da OM
            var inputSigla = $('<label for="siglaOm_' + nodes[id].data.id + '">Sigla da Om</label>' +
                '<input id="siglaOm_' + nodes[id].data.id + '" placeholder="Digite a sigla da Om" ' +
                'class="org-input" type="text" value="' + siglaInicial + '">');

            var inputColor = '<div id="theColorSpace"><div class="row"><div class="offset-4 align-content-center"></div>'+
                '<div class=" p-2 picker"></div></div></div>';

            // nome (troca pelo input)
            $container.find('div[node-id=' + id + '] h2').replaceWith(inputElement);
            // sigla (troca pelo input)
            $container.find('div[node-id=' + id + '] h6').replaceWith(inputSigla);
            //cor pelo input
            $container.find('#colorSpace_' + id).replaceWith(inputColor);

            // monta a colorpick
            var colorPicker = new iro.ColorPicker(".picker", {
                width: 90,
                sliderSize: 10,
                handleRadius: 5,
                display: 'block',
                borderWidth: 1,
                borderColor: '#534646',
                layoutDirection: 'vertical',
                // injeta a cor inicial
                color: initialColor
            });

            colorPicker.on(['color:init', 'color:change'], function(color) {
                // modifica a cor final para a cor escolhida no colorpick
                finalColor = color.hexString;
            });

            // sensação de disabled para os outros nós
            $container.find('.node').each(function () {

                $(this).addClass('disableColor');

            });

            // muda o tamanho pra caber tudo e remove a classe de disable
            $container.find('div[node-id=' + id + ']').addClass('expandForInput').removeClass('disableColor');

            // checkbox pode ver tudo permite edição
            $container.find('#podeVerTudo_' + id).attr('disabled', false);

            // checkbox ePef permite edição
            $container.find('#ePef_' + id).attr('disabled', false);

            // Esconde o botão de editar de todos os nós
            $container.find('.org-edit-button').each(function () {

                $(this).addClass('d-none');

            });

            // esconde o botão de excluir de todos os nós
            $container.find('.org-del-button').each(function () {

                $(this).addClass('d-none');

            });

            // esconde o botão de adicionar nó de todos os nós
            $container.find('.org-add-button').each(function () {

                $(this).addClass('d-none');

            });

            // mostra o botão salvar edição (apenas para o nó em evidência)
            $container.find('div[data-button-id=' + id + ']').removeClass('d-none');


        }



        var hexDigits = ["0","1","2","3","4","5","6","7","8","9","a","b","c","d","e","f"];

        //Function to convert rgb color to hex format
        function rgb2hex(rgb) {
            rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
            return "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
        }

        function hex(x) {
            return isNaN(x) ? "00" : hexDigits[(x - x % 16) / 16] + hexDigits[x % 16];
        }

        // clica para salvar as alterações
        $(document).on('click', '.salvante', function (e) {

            let nodeIdReference = $(this).attr('id').split('_')[1];

            e.stopPropagation();

            commitChange(nodeIdReference, finalColor);



        });

        // clica para cancelar as alterações
        $(document).on('click', '.cancelante', function (e) {

            let nodeIdReference = $(this).attr('id').split('_')[1];

            console.log(nodes[nodeIdReference].data.novoNo);

            e.stopPropagation();

           if (nodes[nodeIdReference].data.novoNo){



               var thisId = nodeIdReference;


               if (self.opts.onDeleteNode !== null) {
                   self.opts.onDeleteNode(nodes[thisId]);
               } else {
                   self.deleteNode(thisId);
               }
               e.stopPropagation();

           } else {


               // dado inicial
               /*
               0 - nome
               1 - sigla
               2 - cor
               3 - podevertudo
               4- é pef
                */

               var valorNameIni = dadoInicial[0];
               var valorSiglaIni = dadoInicial[1];
               var valorCorIni = dadoInicial[2];
               var valorPodeVerTudoIni = dadoInicial[3];
               var valorEPefIni = dadoInicial[4];

               var h2Element = $('<span id="nameElement_' + nodeIdReference + '"><h2>' + valorNameIni + '</h2></span>');
               var h6Element = $('<span id="siglaElement_' + nodeIdReference + '"><h6>' + valorSiglaIni + '</h6></span>');
               var colorElement = $('<span id="colorSpace_' + nodeIdReference + '" class="corbox" style="background-color: ' + valorCorIni + '"></span>');

               var spanNameElement = $container.find('#nameElement_' + nodeIdReference);
               var spanSiglaElement = $container.find('#siglaElement_' + nodeIdReference);
               var spanColorElement = $container.find('#theColorSpace');

               // troca pelo novo nome
               spanNameElement.replaceWith(h2Element);

               // troca pela nova sigla
               spanSiglaElement.replaceWith(h6Element);

               // troca pela nova cor
               spanColorElement.replaceWith(colorElement);

               // desabilita o pode ver tudo
               // se o podever tudo é false tem que deixar sem o check

               if (valorPodeVerTudoIni){

                   $container.find('#podeVerTudo_' + nodeIdReference).prop('checked',true).attr('disabled', true);

               } else {
                   $container.find('#podeVerTudo_' + nodeIdReference).prop('checked',false).attr('disabled', true);
               }

               // desabilita o ePef
               // se o ePef é false tem que deixar sem o check

               if (valorEPefIni){

                   $container.find('#ePef_' + nodeIdReference).prop('checked', true).attr('disabled', true);
               } else {
                   $container.find('#ePef_' + nodeIdReference).prop('checked', false).attr('disabled', true);
               }

               // altera para compactar
               $container.find('div[node-id=' + nodeIdReference + ']').removeClass('expandForInput');

               // oculta o botão de salvar
               $container.find('div[data-button-id=' + nodeIdReference + ']').addClass('d-none');

               // mostra os botões de editar
               $container.find('.org-edit-button').each(function () {

                   $(this).removeClass('d-none');

               });

               // mostra novamente o botão de excluir OM
               $container.find('.org-del-button').each(function () {

                   $(this).removeClass('d-none');

               });

               // mostra novamente o botão de adicionar filho
               $container.find('.org-add-button').each(function () {

                   $(this).removeClass('d-none');

               });

               // remove sensação de disabled para os nós
               $container.find('.node').each(function () {

                   $(this).removeClass('disableColor');

               });


           }




            dadoInicial =[];






        });






        // salva as alterações nos nós
        function commitChange(id,theColor) {

            var valorInputName = $('#nomeOm_' + nodes[id].data.id).val();

            var valorInputSigla = $('#siglaOm_' + nodes[id].data.id).val();

            var h2Element = $('<span id="nameElement_' + nodes[id].data.id + '"><h2>' + valorInputName + '</h2></span>');
            var h6Element = $('<span id="siglaElement_' + nodes[id].data.id + '"><h6>' + valorInputSigla + '</h6></span>');
            var colorElement = $('<span id="colorSpace_' + nodes[id].data.id + '" class="corbox" style="background-color: ' + theColor + '"></span>');

            var spanNameElement = $container.find('#nameElement_' + nodes[id].data.id);
            var spanSiglaElement = $container.find('#siglaElement_' + nodes[id].data.id);
            var spanColorElement = $container.find('#theColorSpace');

            // troca pelo novo nome
            spanNameElement.replaceWith(h2Element);

            // troca pela nova sigla
            spanSiglaElement.replaceWith(h6Element);

            // troca pela nova cor
            spanColorElement.replaceWith(colorElement);

            // desabilita o pode ver tudo e o epef
            $container.find('#podeVerTudo_' + id).attr('disabled', true);
            $container.find('#ePef_' + id).attr('disabled', true);

            // altera para compactar
            $container.find('div[node-id=' + id + ']').removeClass('expandForInput');

            // oculta o botão de salvar
            $container.find('div[data-button-id=' + id + ']').addClass('d-none');

            // mostra os botões de editar
            $container.find('.org-edit-button').each(function () {

                $(this).removeClass('d-none');

            });

            // mostra novamente o botão de excluir OM
            $container.find('.org-del-button').each(function () {

                $(this).removeClass('d-none');

            });

            // mostra novamente o botão de adicionar filho
            $container.find('.org-add-button').each(function () {

                $(this).removeClass('d-none');

            });

            // remove sensação de disabled para os nós
            $container.find('.node').each(function () {

                $(this).removeClass('disableColor');

            });

            dadoInicial =[];
        }

        //inicializa os dados de um novo nó
        this.newNode = function (parentId) {
            var nextId = Object.keys(nodes).length;
            while (nextId in nodes) {
                nextId++;
            }

            self.addNode({id: nextId, name: '', sigla: '', cor: '#000000', podeVerTudo: '',ePef: '', parent: parentId, novoNo: true});
        }

        // adiciona o novo nó
        this.addNode = function (data) {
            var newNode = new Node(data);
            nodes[data.id] = newNode;
            nodes[data.parent].addChild(newNode);

            self.draw();
            self.startEdit(data.id);
        }

        // deleta o nó
        this.deleteNode = function (id) {
            for (var i = 0; i < nodes[id].children.length; i++) {
                self.deleteNode(nodes[id].children[i].data.id);
            }
            nodes[nodes[id].data.parent].removeChild(id);
            delete nodes[id];
            self.draw();
        }

        // traz informações sobre o nó
        this.getData = function () {
            var outData = [];
            for (var i in nodes) {
                outData.push(nodes[i].data);
            }
            return outData;
        }

        // constructor
        for (var i in data) {
            var node = new Node(data[i]);
            nodes[data[i].id] = node;
        }

        // generate parent child tree
        for (var i in nodes) {
            if (nodes[i].data.parent == 0) {
                rootNodes.push(nodes[i]);
            } else {
                nodes[nodes[i].data.parent].addChild(nodes[i]);
            }
        }

        // draw org chart
        $container.addClass('orgChart');
        self.draw();
    }

    // functions dos nós
    function Node(data) {
        this.data = data;
        this.children = [];
        var self = this;

        // adicionar nó
        this.addChild = function (childNode) {
            this.children.push(childNode);
        }

        // remover nó
        this.removeChild = function (id) {
            for (var i = 0; i < self.children.length; i++) {
                if (self.children[i].data.id == id) {
                    self.children.splice(i, 1);
                    return;
                }
            }
        }

        // renderiza o espaço dos nós
        this.render = function (opts) {
            var childLength = self.children.length,
                mainTable;

            mainTable = "<table cellpadding='0' cellspacing='0' border='0'>";
            var nodeColspan = childLength > 0 ? 2 * childLength : 2;
            mainTable += "<tr><td colspan='" + nodeColspan + "'>" + self.formatNode(opts) + "</td></tr>";

            if (childLength > 0) {
                var downLineTable = "<table cellpadding='0' cellspacing='0' border='0'><tr class='lines x'><td class='line left half'></td><td class='line right half'></td></table>";
                mainTable += "<tr class='lines'><td colspan='" + childLength * 2 + "'>" + downLineTable + '</td></tr>';

                var linesCols = '';
                for (var i = 0; i < childLength; i++) {
                    if (childLength == 1) {
                        linesCols += "<td class='line left half'></td>";    // keep vertical lines aligned if there's only 1 child
                    } else if (i == 0) {
                        linesCols += "<td class='line left'></td>";     // the first cell doesn't have a line in the top
                    } else {
                        linesCols += "<td class='line left top'></td>";
                    }

                    if (childLength == 1) {
                        linesCols += "<td class='line right half'></td>";
                    } else if (i == childLength - 1) {
                        linesCols += "<td class='line right'></td>";
                    } else {
                        linesCols += "<td class='line right top'></td>";
                    }
                }
                mainTable += "<tr class='lines v'>" + linesCols + "</tr>";

                mainTable += "<tr>";
                for (var i in self.children) {
                    mainTable += "<td colspan='2'>" + self.children[i].render(opts) + "</td>";
                }
                mainTable += "</tr>";
            }
            mainTable += '</table>';
            return mainTable;
        }

        // renderiza os nós
        this.formatNode = function (opts) {

            // variáveis declaradas
            var nameString = '',
                descString = '',
                siglaString = '',
                corString = '',
                podeVerTudoBoolean = '';

            // name
            if (typeof data.name !== 'undefined') {
                nameString = '<span id="nameElement_' + self.data.id + '"><h2>' + self.data.name + '</h2></span>';
            }

            //cor
            if (typeof data.cor !== 'undefined') {
                corString = '<br>Cor: <span id="colorSpace_'+self.data.id+'" class="corbox" style="background-color: ' + self.data.cor + '"></span>';
            }

            //sigla
            if (typeof data.sigla !== 'undefined') {
                siglaString = '<br><span id="siglaElement_' + self.data.id + '"><h6>' + self.data.sigla + '</h6></span>';
            }

            //pode ver tudo
            if (typeof data.podeVerTudo !== 'undefined') {

                let inputAttributeVer = '';
                let inputAttributePef = '';
                if (data.podeVerTudo == true) {
                    inputAttributeVer = 'checked';
                }
                if (data.ePef == true) {
                    inputAttributePef = 'checked';
                }
                podeVerTudoBoolean = ' <div class="form-group form-check-inline">' +
                    '<input disabled type="checkbox" class="form-check-input" id="podeVerTudo_' + data.id + '" ' + inputAttributeVer + '>' +
                    '<label class="form-check-label" for="podeVerTudo_' + data.id + '">Pode ver tudo.</label>' +
                    '</div>'+
                    '<div class="form-check form-check-inline">' +
                    '<input disabled class="form-check-input" type="checkbox" id="ePef_'+data.id+'" ' + inputAttributePef + ' >' +
                    '<label class="form-check-label" for="ePef_'+data.id+'">É PEF</label>' +
                    '</div>';

            }


            // description
            if (typeof data.description !== 'undefined') {
                descString = '<p>' + 'self.data.description' + '</p>';
            }

            // botão salvar e cancelar
            var saveEditButton = '<div class="mt-3 d-none" data-button-id="' + self.data.id + '">'+
                '<button class="salvante btn btn-sm btn-primary col-5" id="salvar_' + self.data.id + '">Salvar</button>'+
                '<button class="cancelante btn btn-sm btn-danger ml-2 col-5" id="cancelar_' + self.data.id + '">Cancelar</button>'+
                '</div>';

            // controls
            if (opts.showControls) {
                var buttonsHtml = "<div class='org-add-button'><i class='fa fa-plus-circle'></i> " + opts.newNodeText + "</div><div class='org-del-button'><i class='fa fa-trash'></i></div><div class='org-edit-button'><i class='fa fa-edit'></i> </div>";
            } else {
                buttonsHtml = '';
            }

            // monta a view
            return "<div class='node' node-id='" + this.data.id + "'>" + nameString + siglaString + descString + podeVerTudoBoolean + corString + saveEditButton + buttonsHtml + "</div>";

        }

    }

})(jQuery);

