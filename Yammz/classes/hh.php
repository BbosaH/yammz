

import {Http} from '@angular/http';
import {CustomHttp} from '/path';



<div *ngIf="selectedSet">  
        <ul class="collection">
            <li class="collection-item avatar" (click)="isDone = !isDone"[ngClass]="{'done': isDone }" *ngFor='let set of newSetCollection;  #i = index; #last = last'>
                <img src="{{set.pic_left}}" alt="" class="circle">
                <div class="collection-content">
                    <span class="title">{{set.sets}} {{set.name}}</span>
                    <table>
                        <tr>
                            <th>Effected:</th>
                            <td><span> {{set.MainMuscleWorked}}</span> <!--span>, Middle Back, Triceps</span--></td>
                        </tr>
                        <tr>
                            <th>Use:</th>
                            <td><span>{{set.Equipment}}</span></td>
                        </tr>
                    </table>
                </div>
                <a href="#" class="secondary-content" (click)="isDone = !isDone;"><i class="material-icons">grade</i></a>
            </li>
        </ul>
    </div> 
