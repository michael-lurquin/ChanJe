$(function() {
    $('td, th', '#table-sortable').each(function () {
      var cell = $(this);
      cell.width(cell.width());
    });
    $('#table-sortable tbody').sortable({
        cursor: 'move',
        tolerance: 'pointer',
        placeholder: "ui-sortable-placeholder",
        handle: '.draggable',
        start: function(event, ui) {
            ui.item.addClass('warning');
        },
        stop: function(event, ui) {
            ui.item.removeClass('warning');
            $('#table-sortable-save').show();
        }
    });

    $('.btn-role-edit').click(function() {
        var name = $(this).attr('data-name');
        var url = $(this).attr('data-url');
        $('#panel-role-edition .panel-heading').html('Éditer le rôle');
        $('#panel-role-edition input#name').val(name);
        $('#panel-role-edition input[name=_method]').val('PUT');
        $('#panel-role-edition form').attr('action', url);
        $('#btn-role-edition-cancel').show();
    });

    $('#btn-role-edition-cancel').click(function() {
        var url = $('#panel-role-edition form').attr('data-url');
        $('#panel-role-edition .panel-heading').html('Ajouter un rôle');
        $('#panel-role-edition input#name').val('');
        $('#panel-role-edition input[name=_method]').val('POST');
        $('#panel-role-edition form').attr('action', url);
        $(this).hide();
    });
});
