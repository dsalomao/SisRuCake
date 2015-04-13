<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 28/08/14
 * Time: 14:20
 */

    $this->Html->css('dashboard', array('inline' => false));
?>
<h2 class="header smaller lighter green">Logística & suprimentos</h2>
<ul class="list-group">
    <?php
    echo $this->Html->link(
        $this->Html->tag(
            'i',
            '',
            array('class' => 'glyphicon glyphicon-shopping-cart pull-right bigger-230')
        ).$this->Html->tag(
            'h4',
            'Produtos',
            array('class' => 'list-group-item-heading')
        ).$this->Html->tag(
            'p',
            'Todas as informações de seus produtos como quantidade, quantidade máxima e mínima, últimas entradas e saídas em estoque...',
            array('class' => 'list-group-item-text')
        ),
        array(
            'controller' => 'products',
            'action' => 'index'
        ),
        array('class' => 'list-group-item', 'escape' => false)
    );
    echo $this->Html->link(
        $this->Html->tag(
            'span',
            '',
            array('class' => 'glyphicon glyphicon-scale pull-right bigger-230')
        ).$this->Html->tag(
            'h4',
            'Unidades de medida',
            array('class' => 'list-group-item-heading')
        ).$this->Html->tag(
            'p',
            'Administre as unidades de medida de acordo com a nessecidade de seu estoque.',
            array('class' => 'list-group-item-text')
        ),
        array(
            'controller' => 'measureUnits',
            'action' => 'index'
        ),
        array('class' => 'list-group-item', 'escape' => false)
    );
    echo $this->Html->link(
        $this->Html->tag(
            'i',
            '',
            array('class' => 'glyphicon glyphicon-refresh pull-right bigger-230')
        ).$this->Html->tag(
            'h4',
            'Fornecedor',
            array('class' => 'list-group-item-heading')
        ).$this->Html->tag(
            'p',
            'Cadastre e administre seus fornecedores e seus produtos fornecidos.',
            array('class' => 'list-group-item-text')
        ),
        array(
            'controller' => 'suppliers',
            'action' => 'index'
        ),
        array('class' => 'list-group-item', 'escape' => false)
    );
    echo $this->Html->link(
        $this->Html->tag(
            'i',
            '',
            array('class' => 'glyphicon glyphicon-download pull-right bigger-230')
        ).$this->Html->tag(
            'h4',
            'Caderno de entrada',
            array('class' => 'list-group-item-heading')
        ).$this->Html->tag(
            'p',
            'Um local para saber sobre os produtos que entraram na cozinha.',
            array('class' => 'list-group-item-text')
        ),
        array(
            'controller' => 'suppliesProducts',
            'action' => 'index'
        ),
        array('class' => 'list-group-item', 'escape' => false)
    );
    echo $this->Html->link(
        $this->Html->tag(
            'i',
            '',
            array('class' => 'glyphicon glyphicon-upload pull-right bigger-230')
        ).$this->Html->tag(
            'h4',
            'Caderno de saída',
            array('class' => 'list-group-item-heading')
        ).$this->Html->tag(
            'p',
            'Um local para saber sobre os produtos que sairam de sua cozinha.',
            array('class' => 'list-group-item-text')
        ),
        array(
            'controller' => 'productOutput',
            'action' => 'index'
        ),
        array('class' => 'list-group-item', 'escape' => false)
    );
    ?>
</ul>
<h2 class="header smaller lighter green">Receituário padrão</h2>
<ul class="list-group">
    <?php echo $this->Html->link(
        $this->Html->tag(
            'i',
            '',
            array('class' => 'glyphicon glyphicon-book pull-right bigger-230')
        ).$this->Html->tag(
            'h4',
            'Livro de receitas',
            array('class' => 'list-group-item-heading')
        ).$this->Html->tag(
            'p',
            'Cadastre e administre suas receitas, lista de ingredientes, porcionamento de cada receita e outras funções.',
            array('class' => 'list-group-item-text')
        ),
        array(
            'controller' => 'recipes',
            'action' => 'index'
        ),
        array('class' => 'list-group-item', 'escape' => false)
    ); ?>
</ul>
<h2 class="header smaller lighter blue">Planejamento de cardápio</h2>
<ul class="list-group">
    <?php echo $this->Html->link(
        $this->Html->tag(
            'i',
            '',
            array('class' => 'glyphicon glyphicon-cutlery pull-right bigger-230')
        ).$this->Html->tag(
            'h4',
            'Livro de refeições',
            array('class' => 'list-group-item-heading')
        ).$this->Html->tag(
            'p',
            'Planeje e monte suas refeições, alocando as receitas de acordo com seu planejamento nutricional.',
            array('class' => 'list-group-item-text')
        ),
        array(
            'controller' => 'meals',
            'action' => 'index'
        ),
        array('class' => 'list-group-item', 'escape' => false)
    );
    echo $this->Html->link(
        $this->Html->tag(
            'i',
            '',
            array('class' => 'glyphicon glyphicon-bell pull-right bigger-230')
        ).$this->Html->tag(
            'h4',
            'Eventos',
            array('class' => 'list-group-item-heading')
        ).$this->Html->tag(
            'p',
            'Utilize sua agenda para manter-se informado dos últimos eventos (refeições e lembretes) cadastrados.',
            array('class' => 'list-group-item-text')
        ),
        array(
            'controller' => 'events',
            'action' => 'index'
        ),
        array('class' => 'list-group-item', 'escape' => false)
    );
    echo $this->Html->link(
        $this->Html->tag(
            'i',
            '',
            array('class' => 'glyphicon glyphicon-calendar pull-right bigger-230')
        ).$this->Html->tag(
            'h4',
            'Calendário',
            array('class' => 'list-group-item-heading')
        ).$this->Html->tag(
            'p',
            'Agenda de eventos de seu R.U.',
            array('class' => 'list-group-item-text')
        ),
        array(
            'controller' => 'events',
            'action' => 'calendar'
        ),
        array('class' => 'list-group-item', 'escape' => false)
    ); ?>
</ul>
<h2 class="header smaller lighter purple">Usuários do sistema</h2>
<ul class="list-group">
    <?php echo $this->Html->link(
        $this->Html->tag(
            'i',
            '',
            array('class' => 'glyphicon glyphicon-user pull-right bigger-230')
        ).$this->Html->tag(
            'h4',
            'Caderno de usuários',
            array('class' => 'list-group-item-heading')
        ).$this->Html->tag(
            'p',
            'Adicione, remova e dê permissões para os usuários do sistema de acordo com seu nível de administrador.',
            array('class' => 'list-group-item-text')
        ),
        array(
            'controller' => 'users',
            'action' => 'index'
        ),
        array('class' => 'list-group-item', 'escape' => false)
    );
    echo $this->Html->link(
        $this->Html->tag(
            'i',
            '',
            array('class' => 'glyphicon glyphicon-plus pull-right bigger-230')
        ).$this->Html->tag(
            'h4',
            'Adicionar usuário',
            array('class' => 'list-group-item-heading')
        ).$this->Html->tag(
            'p',
            'Um local para saber sobre os produtos que entraram na cozinha.',
            array('class' => 'list-group-item-text')
        ),
        array(
            'controller' => 'users',
            'action' => 'add'
        ),
        array('class' => 'list-group-item', 'escape' => false)
    ); ?>
</ul>