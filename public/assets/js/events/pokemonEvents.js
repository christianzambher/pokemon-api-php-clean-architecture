const pokemonState = {
    currentPokemon: null
};

async function loadPokemonAbilities(url, pokemonId) {

    try {

        const result = await $.ajax({
            url: url,
            method: 'GET'
        });

        let abilities = '';

        result.abilities.forEach(ability => {

            abilities += `
                <li class="text-capitalize">
                    ${ability.ability.name}
                </li>
            `;
        });

        $(`#liHabilidades${pokemonId}`)
            .html(abilities);

        $(`#liExpBase${pokemonId}`)
            .html(`<li>${result.base_experience}</li>`);

        renderPokemonImages(
            result.sprites,
            pokemonId
        );

    } catch (error) {

        console.error(error);
    }
}

$(document).on(
    'click',
    '.btn-save-pokemon',
    async function () {

        const pokemonId =
            $(this).data('pokemon-id');

        await preSavePokemon(pokemonId);
    }
);

$(document).on(
    'click',
    '.btn-delete-pokemon',
    async function () {

        const pokemonId =
            $(this).data('pokemon-id');

        await preDeletePokemon(pokemonId);
    }
);

$(document).on(
    'click',
    '.btn-send-pokemon',
    async function () {

        const pokemonId =
            $(this).data('pokemon-id');

        await preSendPokemon(pokemonId);
    }
);

async function preSavePokemon(pokemonId) {

    try {

        const result =
            await getPokemonById(pokemonId);

        processSavePokemon(result);

        $('#modalGuardarDatos')
            .modal('show');

    } catch (error) {

        console.error(error);
    }
}

async function preDeletePokemon(pokemonId) {

    try {

        const result =
            await getPokemonById(pokemonId);

        processDeletePokemon(result);

        $('#modalEliminarDatos')
            .modal('show');

    } catch (error) {

        console.error(error);
    }
}

async function preSendPokemon(pokemonId) {

    try {

        const result =
            await getPokemonById(pokemonId);

        processSendPokemon(result);

        $('#txtEmail').val(null);

        $('#btnEnviarCorreo')
            .prop('disabled', true);

        $('#modalEnvioCorreo')
            .modal('show');

    } catch (error) {

        console.error(error);
    }
}

function processDeletePokemon(result) {

    $('#txtNumPokeDelete')
        .val(result.id);
}

function processSendPokemon(result) {

    pokemonState.currentPokemon = {

        name: result.name,
        abilities: result.abilities,
        baseExperience: result.base_experience,
        sprites: result.sprites
    };
}

function processSavePokemon(result) {

    pokemonState.currentPokemon = result;

    $('#txtNumPokemon')
        .val(result.id);

    $('#txtNombrePoke')
        .val(result.name);

    $('#txtExpBase')
        .val(result.base_experience);

    $('#txtHabilidad1')
        .val(result.abilities[0]?.ability?.name ?? '');

    $('#txtHabilidad2')
        .val(result.abilities[1]?.ability?.name ?? '');

    $('#txtspriteDesc1')
        .val(`back_default_${result.name}`);

    $('#txtspriteUrl1')
        .val(result.sprites.back_default);

    $('#txtspriteDesc2')
        .val(`back_shiny_${result.name}`);

    $('#txtspriteUrl2')
        .val(result.sprites.back_shiny);

    $('#txtspriteDesc3')
        .val(`front_default_${result.name}`);

    $('#txtspriteUrl3')
        .val(result.sprites.front_default);

    $('#txtspriteDesc4')
        .val(`front_shiny_${result.name}`);

    $('#txtspriteUrl4')
        .val(result.sprites.front_shiny);
}