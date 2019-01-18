<template>
    <EditProvider :value="this.data">
    <EditConsumer>
        <div class="card" slot-scope="context">

            <div class="card-body">
                <div class="row">
                    {{context}}
                    <InputField label="Nombre" :value="data.role.name" />
                    <div class="form-group col-sm-12">
                        <label for="nombre">Nombre</label>
                        <input name="nombre" type="text" class="form-control" v-model="data.role.name">
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="descripcion">Descripción</label>
                        <input name="descripcion" type="text" class="form-control" v-model="data.role.description">
                    </div>
                </div>
                <label>Permisos</label>
                <div class="row">
                    <div v-for="m in data.modules" class="col-sm-4">
                        <catalogs-rolemodule :module="m"/>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </EditConsumer>
    </EditProvider>
</template>
<script>
    import axios from 'axios';

    export default {
        data() {
            return {
                data: {
                    role: {
                        name: null,
                        description: null,
                    },
                    modules: []
                },
            }
        },
        mounted() {
            axios.get('/catalogos/roles/1/detail')
            .then(response => {

                this.data = response.data
            });
        },
    }
</script>
