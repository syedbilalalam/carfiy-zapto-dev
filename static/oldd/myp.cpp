#include <iostream>
#include <filesystem>

namespace fs = std::filesystem;

void moveContentsToParent(const fs::path& dir) {
    if (!fs::exists(dir) || !fs::is_directory(dir)) {
        std::cerr << "Invalid directory: " << dir << '\n';
        return;
    }

    for (const auto& entry : fs::directory_iterator(dir)) {
        if (fs::is_directory(entry.path())) {
            // Move all contents of the subfolder to the parent directory
            for (const auto& subEntry : fs::directory_iterator(entry.path())) {
                fs::path newLocation = dir / subEntry.path().filename();
                fs::rename(subEntry.path(), newLocation);
            }
            // Remove the empty directory
            fs::remove(entry.path());
        }
    }
}

int main(int argc, char* argv[]) {
    if (argc != 2) {
        std::cerr << "Usage: " << argv[0] << " <directory>\n";
        return 1;
    }
    
    fs::path targetDir = argv[1];
    moveContentsToParent(targetDir);
    
    return 0;
}
