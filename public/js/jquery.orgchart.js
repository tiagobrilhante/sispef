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

            var nomeInicial = $('#nameElement_' + id + ' h2').text();
            var siglaInicial = $('#siglaElement_' + id + ' h6').text();

            var inputElement = $('<label for="nomeOm_' + nodes[id].data.id + '">Nome da Om</label>'+
                '<input autofocus id="nomeOm_' + nodes[id].data.id + '" placeholder="Digite o nome da Om" '+
                'class="org-input" type="text" value="' + nomeInicial + '">');
            var inputSigla = $('<label for="siglaOm_' + nodes[id].data.id + '">Sigla da Om</label>'+
                '<input id="siglaOm_' + nodes[id].data.id + '" placeholder="Digite a sigla da Om" '+
                'class="org-input" type="text" value="' + siglaInicial + '">');



            // nome (troca pelo input)
            $container.find('div[node-id=' + id + '] h2').replaceWith(inputElement);
            // sigla (troca pelo input)
            $container.find('div[node-id=' + id + '] h6').replaceWith(inputSigla);
            // mostra o botão salvar edição
            $container.find('div[data-button-id=' + id + ']').removeClass('d-none');
            // muda o tamanho pra caber tudo
            $container.find('div[node-id=' + id + ']').addClass('expandForInput');
            // checkbox pode ver tudo permite edição
            $container.find('#podeVerTudo_' + id).attr('disabled', false);
            // Esconde o botão de editar
            $container.find('div[node-id=' + id + '] .org-edit-button').addClass('d-none');
            // esconde os demais botões de adicionar om subordinadas e excluir om
            $container.find('div[node-id=' + id + '] .org-del-button').addClass('d-none');
            $container.find('div[node-id=' + id + '] .org-add-button').addClass('d-none');


           // inputElement.focus();
/*
            inputElement.keyup(function (event) {
                if (event.which == 13) {
                    commitChange();
                } else {
                    nodes[id].data.name = inputElement.val();
                    nodes[id].data.sigla = inputSigla.val();
                }
            });

            inputSigla.keyup(function (event) {
                if (event.which == 13) {
                    commitChange();
                } else {
                    nodes[id].data.name = inputElement.val();
                    nodes[id].data.sigla = inputSigla.val();
                }
            });
*/


        }

        // clica para salvar as alterações
        $(document).on('click','.salvante', function (e) {

            let nodeIdReference = $(this).attr('id').split('_')[1];

            e.stopPropagation();

            commitChange(nodeIdReference);

        } );

        // salva as alterações nos nós
        function commitChange (id) {

            console.log(id);

            var valorInputName = $('#nomeOm_' + nodes[id].data.id).val();

            var valorInputSigla = $('#siglaOm_' + nodes[id].data.id).val();

            var h2Element = $('<span id="nameElement_' + nodes[id].data.id + '"><h2>' + valorInputName + '</h2></span>');
            var h6Element = $('<span id="siglaElement_' + nodes[id].data.id + '"><h6>' + valorInputSigla + '</h6></span>');

            var spanNameElement = $container.find('#nameElement_' + nodes[id].data.id);
            var spanSiglaElement = $container.find('#siglaElement_' + nodes[id].data.id);

            // troca pelo novo nome
            spanNameElement.replaceWith(h2Element);
            // troca pela nova sigla
            spanSiglaElement.replaceWith(h6Element);


            // desabilita o pode ver tudo
            $container.find('#podeVerTudo_' + id).attr('disabled', true);
            // altera para compactar
            $container.find('div[node-id=' + id + ']').removeClass('expandForInput');
            // mostra o botão de editar
            $container.find('div[node-id=' + id + '] .org-edit-button').removeClass('d-none');
            // oculta o botão de salvar
            $container.find('div[data-button-id=' + id + ']').addClass('d-none');
            // mostra novamente os demais botões de adicionar om subordinadas e excluir om
            $container.find('div[node-id=' + id + '] .org-del-button').removeClass('d-none');
            $container.find('div[node-id=' + id + '] .org-add-button').removeClass('d-none');


        }

        //inicializa os dados de um novo nó
        this.newNode = function (parentId) {
            var nextId = Object.keys(nodes).length;
            while (nextId in nodes) {
                nextId++;
            }

            self.addNode({id: nextId, name: '', sigla: '', cor: '#000000', podeVerTudo: '', parent: parentId});
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

    // functions od s nós
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
                corString = 'Cor: <span class="corbox" style="background-color: ' + self.data.cor + '"></span>';
            }

            //sigla
            if (typeof data.sigla !== 'undefined') {
                siglaString = '<br><span id="siglaElement_' + self.data.id + '"><h6>' + self.data.sigla + '</h6></span>';
            }

            //pode ver tudo
            if (typeof data.podeVerTudo !== 'undefined') {

                let inputAttribute = '';
                if (data.podeVerTudo == true) {
                    inputAttribute = 'checked';
                }
                podeVerTudoBoolean = ' <div class="form-group form-check">' +
                    '<input disabled type="checkbox" class="form-check-input" id="podeVerTudo_' + data.id + '" ' + inputAttribute + '>' +
                    '<label class="form-check-label" for="podeVerTudo_' + data.id + '">Pode ver tudo.</label>' +
                    '</div>';

            }

            // description
            if (typeof data.description !== 'undefined') {
                descString = '<p>' + 'self.data.description' + '</p>';
            }

            // botão salvar
            var saveEditButton = '<div class="mt-3 d-none" data-button-id="' + self.data.id + '"><button class="salvante btn btn-sm btn-primary col-11" id="salvar_' + self.data.id + '">Salvar</button></div>';

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

