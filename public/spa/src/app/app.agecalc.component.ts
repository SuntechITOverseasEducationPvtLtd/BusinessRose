import {Pipe, PipeTransform} from '@angular/core';

@Pipe({name: 'calculateAge'})
export class CalculateAgePipe implements PipeTransform {
    public transform(date_of_birth){
        if (!date_of_birth) {
            return '';
        } else {
            let time = new Date(date_of_birth);
            var timeDiff = Math.abs(Date.now() - time.getTime());
			
            //Used Math.floor instead of Math.ceil
            //so 26 years and 140 days would be considered as 26, not 27.
            return Math.floor((timeDiff / (1000 * 3600 * 24))/365);
        }
    }
    
}