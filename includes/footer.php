<div style=" background-color: #EEEEEE; bottom: 0; width: 100%;">
    <div class="row">

        <div class="col-12 text-center" style="padding-top: 25px;">
            Mi rollito: sushi
        </div>
        <div class="col-12 text-center" style="margin-top: 25px; margin-bottom: 25px";>
            Todos los derechos reservados 2021            
        </div>
        

    </div>
    <?php 
        if (isset($nombre)){
        $_SESSION['nombre']=$nombre;
        $_SESSION['idusuario']=$iduser;
        }
        if (isset($_SESSION['car'])){
            $_SESSION['car']=$car;
            $_SESSION['list']=$list;
            $_SESSION['i']=$i;
        };
    ?>
</div>

<!--SCRIPTS-->

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="libs/js/bootstrap-datepicker.js"></script>
<script src="libs/locales/bootstrap-datepicker.es.min.js"></script>
<script>
    $('.input-group.date').datepicker({
    format: "yyyy-mm",
    weekStart: "yyyy-mm",
    startView: 1,
    minViewMode: 1,
    maxViewMode: 2,
    clearBtn: true,
    language: "es",
    multidateSeparator: "/",
    forceParse: false
});
</script>
</body>



</html>