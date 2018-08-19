import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ShortlistsComponent } from './shortlists.component';

describe('ShortlistsComponent', () => {
  let component: ShortlistsComponent;
  let fixture: ComponentFixture<ShortlistsComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ShortlistsComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ShortlistsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
