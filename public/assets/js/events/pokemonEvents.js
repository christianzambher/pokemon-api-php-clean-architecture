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