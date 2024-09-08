## TYPO3 Extbase File Upload test extension

This is a TYPO3 CMS extension for development and testing purposes only. Can be used to test the TYPO3 Core patch: https://review.typo3.org/c/Packages/TYPO3.CMS/+/83749

Note, that the repository uses hardcoded PIDs in controllers and hardcoded uploads paths in file upload annotations.

### Included test scenarios

1. Single file upload with mapping to an `UploadedFile` property of a DTO
2. Single file upload with mapping to an `FileReference` property of a domain model
3. Single file upload with mapping to multiple `FileReference` properties of a domain model
4. Multi file upload with mapping to an `ObjectStorage<UploadedFile>` property of a DTO
5. Multi file upload with mapping to an `ObjectStorage<FileReference>` property of a DTO
6. Backend module with single file upload similar to 2
