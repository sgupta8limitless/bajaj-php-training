import { Component,OnInit } from '@angular/core';
import { MoviesService } from 'src/app/services/movies.service';

@Component({
  selector: 'app-movielist',
  templateUrl: './movielist.component.html',
  styleUrls: ['./movielist.component.css']
})
export class MovielistComponent implements OnInit {

  movies:any;

  constructor(private movieService:MoviesService){}

  ngOnInit() {
    this.movieService.getMovies().subscribe((response)=>{
      this.movies=response;
      console.log(response);
    })
  }




}
