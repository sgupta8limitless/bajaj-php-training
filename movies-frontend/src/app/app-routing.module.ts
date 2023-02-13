import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { MovieComponent } from './pages/movie/movie.component';
import { MovielistComponent } from './pages/movielist/movielist.component';

const routes: Routes = [
  {path:"",component:MovielistComponent},
  {path:'movie/:id',component:MovieComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
