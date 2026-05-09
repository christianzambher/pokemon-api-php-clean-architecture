const registered =
    isPokemonRegistered(pokemonId);

const badge =
    registered
        ? `
            <span class="badge badge-success">
                Registrado
            </span>
        `
        : '';

const saveDisabled =
    registered ? 'disabled' : '';

function createPokemonCard(pokemon) {

    const pokemonId = pokemon.url.split('/')[6];

    return `
        <div class="col-4">

            <div class="card mb-3 shadow">

                <div class="card-header bg-secondary text-white">

                    <h3 class="card-title text-capitalize">
                        ${pokemon.name}
                    </h3>

                </div>

                <div class="card-body">

                    <h4>
                        <i class="fas fa-hand-rock"></i>
                        Habilidades
                    </h4>

                    <ul id="liHabilidades${pokemonId}"></ul>

                    <h4>
                        <i class="fas fa-chart-area"></i>
                        Experiencia base
                    </h4>

                    <ul id="liExpBase${pokemonId}"></ul>

                    <h4>
                        <i class="fas fa-image"></i>
                        Sprites
                    </h4>

                    <div id="divImages${pokemonId}"></div>

                    <hr>

                    <button
                        class="btn btn-lg btn-primary text-light rounded-circle btn-save-pokemon"
                        data-pokemon-id="${pokemonId}"
                        title="Guardar">

                        <i class="fas fa-save"></i>

                    </button>

                    <button
                        class="btn btn-lg btn-danger text-light rounded-circle btn-delete-pokemon"
                        data-pokemon-id="${pokemonId}"
                        title="Eliminar">

                        <i class="fas fa-trash"></i>

                    </button>

                    <button
                        class="btn btn-lg btn-secondary text-light rounded-circle btn-send-pokemon"
                        data-pokemon-id="${pokemonId}"
                        title="Enviar">

                        <i class="fas fa-paper-plane"></i>

                    </button>

                </div>

            </div>

        </div>
    `;
}

function renderPokemonList(pokemons) {

    let html = '';

    pokemons.forEach(pokemon => {
        html += createPokemonCard(pokemon);
    });

    $('#divContent').html(html);
}

function renderPokemonImages(sprites, pokemonId) {

    let html = '';

    const images = [
        sprites.back_default,
        sprites.back_shiny,
        sprites.front_default,
        sprites.front_shiny
    ];

    images.forEach(image => {

        if (!image) {
            return;
        }

        html += `
            <a download href="${image}" target="_blank">
                <img
                    src="${image}"
                    class="img-fluid"
                >
            </a>
        `;
    });

    $(`#divImages${pokemonId}`).html(html);
}

function isPokemonRegistered(pokemonId) {

    return appState.registeredPokemons
        .some(
            pokemon =>
                Number(pokemon.Numero_Pokemon)
                === Number(pokemonId)
        );
}