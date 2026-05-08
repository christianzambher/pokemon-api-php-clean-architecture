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