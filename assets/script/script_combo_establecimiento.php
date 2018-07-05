<script type="text/javascript">
            $(document).ready(function() {
                $("#id_pais").change(function() {
                    $("#id_pais option:selected").each(function() {
                        id_pais = $('#id_pais').val();
                        $.post("<?php echo base_url(); ?>pais/fill_ciudad", {
                            id_pais : id_pais
                        }, function(data) {
                          $("#id_ciudad").html(data);
                          $("#id_ciudad").selectpicker('refresh');
                        });
                    });
                });
            });
               $(document).ready(function() {
                $("#id_categoria").change(function() {
                    $("#id_categoria option:selected").each(function() {
                        id_categoria = $('#id_categoria').val();
                        $.post("<?php echo base_url(); ?>categoria/fill_sub_cat", {
                            id_categoria : id_categoria
                        }, function(data) {
                            $("#id_sub_cat").html(data);
                            $("#id_sub_cat").selectpicker('refresh');
                        });
                    });
                });
            });
        </script>