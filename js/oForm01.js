const app = new Vue({
	el: '#app',
    	data: {
            opt1: 0,
            opt2: 0,
            opt3: 0,
            opt4: 0,
            opt5: 0,
            opt6: 0,
            opt7: 0,
            optDos1: 0,
            optDos2: 0,
            optDos3: 0,
            optDos4: 0,
            optDos5: 0,
            optDos6: 0,
            optDos7: 0,
            valorF: 0,
            valor2F: 0,
            valoSuper: 0,
            ejemplo: '',
            color: true,
            campoRequerido: true,
            campoRequeridoDos: true,
            valorX: 0,
            valor2X: 0,
    		seccionX: [
    		'I.- Acontecimiento traumático severo',
    		'II.- Recuerdos persistentes sobre el acontecimiento? (durante el último mes)',
    		'III.- Esfuerzo por evitar circunstancias parecidas o asociadas al acontecimiento (durante el último mes)',
    		'IV.- Afectación (durante el último mes)'
    		],
    		preguntaI: [
    			{nOpt:'opt1', preg:'¿Ha presenciado o sufrido alguna vez, durante o con motivo del trabajo un acontecimiento como los siguientes?'},
    			{nOpt:'opt2', preg:'¿Accidente que tenga como consecuencia la muerte, la pérdida de un miembro o una lesión grave?'},
    			{nOpt:'opt3', preg:'¿Asaltos?'},
    			{nOpt:'opt4', preg:'¿Actos violentos que derivaron en lesiones graves?'},
    			{nOpt:'opt5', preg:'¿Secuestro?'},
    			{nOpt:'opt6', preg:'¿Amenazas?'},
    			{nOpt:'opt7', preg:'¿Cualquier otro que ponga en riesgo su vida o salud, y/o la de otras personas?'}
    		],
    		preguntaII: [
    			{nOpt:'opt8', preg:'¿Ha tenido recuerdos recurrentes sobre el acontecimiento que le provocan malestares?'},
    			{nOpt:'opt9', preg:'¿Ha tenido sueños de carácter recurrente sobre el acontecimiento, que le producen malestar?'}
    		],
    		preguntaIII: [
    			{nOpt:'opt10', preg:'¿Se ha esforzado por evitar todo tipo de sentimientos, conversaciones o situaciones que le puedan recordar el acontecimiento?'},
    			{nOpt:'opt11', preg:'¿Se ha esforzado por evitar todo tipo de actividades, lugares o personas que motivan recuerdos del acontecimiento?'},
    			{nOpt:'opt12', preg:'¿Ha tenido dificultad para recordar alguna parte importante del evento?'},
    			{nOpt:'opt13', preg:'¿Ha disminuido su interés en sus actividades cotidianas?'},
    			{nOpt:'opt14', preg:'¿Se ha sentido usted alejado o distante de los demás?'},
    			{nOpt:'opt15', preg:'¿Ha notado que tiene dificultad para expresar sus sentimientos?'},
    			{nOpt:'opt16', preg:'¿Ha tenido la impresión de que su vida se va a acortar, que va a morir antes que otras personas o que tiene un futuro limitado?'}
    		],
    		preguntaIV: [
    			{nOpt:'opt17', preg:'¿Ha tenido usted dificultades para dormir?'},
    			{nOpt:'opt18', preg:'¿Ha estado particularmente irritable o le han dado arranques de coraje?'},
    			{nOpt:'opt19', preg:'¿Ha tenido dificultad para concentrarse?'},
    			{nOpt:'opt20', preg:'¿Ha estado nervioso o constantemente en alerta?'},
    			{nOpt:'opt21', preg:'¿Se ha sobresaltado fácilmente por cualquier cosa?'}
    		],
    	},
        computed: {
            primeraCompro() {
                this.valorX = 0;
                this.valorX = this.opt1 + this.opt2 + this.opt3 + this.opt4  + this.opt5 + this.opt6 + this.opt7;
                this.valor2X = 0;
                this.valor2X = this.optDos1 + this.optDos2 + this.optDos3 + this.optDos4  + this.optDos5 + this.optDos6 + this.optDos7;
                
                if (this.valorX > 0) {
                    this.valorF = 1;                    
                }else{
                    this.valorF = 0;
                }

                if (this.valor2X === 6) {
                    this.valor2F = 1;                    
                }else{
                    this.valor2F = 0;
                }

                this.valoSuper = this.valorF + this.valor2F;

                if (this.valoSuper === 2) {
                    this.color = false;
                }else{
                    this.color = true;
                }

                return this.color;
            
            }
        }
})