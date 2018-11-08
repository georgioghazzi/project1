import { TestBed } from '@angular/core/testing';

import { EmptycartloginService } from './emptycartlogin.service';

describe('EmptycartloginService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: EmptycartloginService = TestBed.get(EmptycartloginService);
    expect(service).toBeTruthy();
  });
});
