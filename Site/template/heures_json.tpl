{
	"new_table" : "{foreach from=$allSeances item=seance}<tr><td>{$seance.nomFormation}</td><td>{$seance.codeApogee}</td><td>{$seance.nomMatiere}</td><td>{$seance.dateSeance}</td><td>{$seance.heureDebut}</td><td>{$seance.heureFin}</td><td>{if $seance.volumeReparti ==0} NON {else} OUI {/if}</td><td>{if $seance.forfaitaire == 0} NON {else} OUI {/if}</td><td>{$seance.dureeCM}</td><td>{$seance.dureeTD}</td><td>{$seance.dureeTP}</td><td>TODO</td><td>TODO</td></tr>{/foreach}"
}