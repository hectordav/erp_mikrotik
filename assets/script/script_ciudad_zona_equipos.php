<script type="text/javascript">
            $(document).ready(function() {
                $("#id_ciudad").change(function() {
                    $("#id_ciudad option:selected").each(function() {
                        id_ciudad = $('#id_ciudad').val();
                        $.post("<?php echo base_url(); ?>ciudad/fill_zona", {
                            id_ciudad : id_ciudad
                        }, function(data) {
                            $("#id_zona").html(data);
                        });
                    });
                });
            });
             $(document).ready(function() {
                $("#id_marca").change(function() {
                    $("#id_marca option:selected").each(function() {
                        id_marca = $('#id_marca').val();
                        $.post("<?php echo base_url(); ?>modelo/fill_modelo", {
                            id_marca : id_marca
                        }, function(data) {
                            $("#id_modelo").html(data);
                        });
                    });
                });
            });
        </script>