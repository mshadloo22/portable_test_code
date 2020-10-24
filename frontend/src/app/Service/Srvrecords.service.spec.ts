import { TestBed, inject } from '@angular/core/testing';

import { SrvrecordsService } from './Srvrecords.service';

describe('SrvrecordsService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [SrvrecordsService]
    });
  });

  it('should be created', inject([SrvrecordsService], (service: SrvrecordsService) => {
    expect(service).toBeTruthy();
  }));
});
